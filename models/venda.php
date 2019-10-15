<?php

    class venda extends model{

        public function __construct(){
            parent::__construct();
        }

        public function getPedidos($id, $idUsuario){
                $array = array();

                $sql = "SELECT *, (SELECT pagamentos.nome 
                FROM pagamentos WHERE pagamentos.id = vendas.formaPagamento) as 
                tipoPgto FROM vendas WHERE id = '$id' AND 
                idUsuario = '$idUsuario'";
                $sql = $this -> db -> query($sql);

                if($sql -> rowCount() > 0){
                    $array = $sql -> fetch();
                    $array['produtos'] = $this -> getProdutosPedido($id);
                }

                return $array;
        }

        public function getProdutosPedido($id){
            $array = array();

            $sql = "SELECT 
            vendaproduto.qtde, vendaproduto.idProduto, 
            produtos.nome, produtos.imagem, produtos.preco 
            FROM vendaproduto 
            LEFT JOIN produtos ON vendaproduto.idProduto = produtos.id 
            WHERE vendaproduto.idVenda = '$id'";
            
            $sql = $this -> db -> query($sql);
            
            if($sql -> rowCount() > 0){
                $array = $sql -> fetchAll();
            }
            return $array;
        }

        public function getPedidosUsuario($idUsuario){
            $array = array();
            if(!empty($idUsuario)){
                 $sql = "SELECT *, (SELECT pagamentos.nome FROM pagamentos WHERE pagamentos.id = vendas.formaPagamento) as tipoPgto FROM vendas WHERE idUsuario = '$idUsuario'";
                 $sql = $this -> db -> query($sql);
                 if($sql -> rowCount() > 0){
                     $array = $sql -> fetchAll();
                 }
            }
            return $array;
        }


        public function verificarVendas(){
            require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
            $code = '';
            $type = '';

            if(isset($_POST['notificationCode']) && isset($_POST['notificationType'])){
                $code = trim($_POST['notificationCode']);
                $type = trim($_POST['notificationType']);

                $notificationType = new PagSeguroNotificationType($type);
                $strType = $notificationType -> getTypeFromValue();

                $credentials = PagSeguroConfig::getAccountCredentials();

                try{
                    $transaction = PagSeguroNotificationService::checkTransaction($credentials, $code);
                    $ref =  $transaction -> getReference();
                    $status = $transaction -> getStatus() -> getValue();

                    $novoStatus = 0;
                    switch($status){
                        case '1': // Aguardando Pgto
                        case '2': // Em análise
                        $novoStatus = '1';
                        break;
                        case '3': //Paga                      /** Retornos dos tipos de status do PagSeguro */ 
                        case '4': //Disponível                //  Voltar e revisar a aula "17-loja virtual+pagamento 16
                            $novoStatus = '2';
                        break;                              
                        case '6': //Devolvida
                        case '7': //Cancelada
                            $novoStatus = '3';
                        break;    
                    }
                    $this -> db -> query("UPDATE vendas SET status = '$novoStatus' WHERE id = '$ref'"); 

                }catch(PagSeguroServiceException $e){
                    echo "Falha: ".$e -> getMessage();
                }
            }
        }

        public function setVenda($uid, $endereco, $subtotal, $pg, $prods){
            
            /*
                1 => Aguardando Pagamento
                2 => Aprovado
                3 => Cancelado
            */
           
            $status = '1';
            $pgLink = '';

            $sql = "INSERT INTO vendas SET idUsuario = '$uid', endereco = '$endereco', total = '$subtotal', formaPagamento = '$pg', status = '$status', pgLink = '$pgLink'";
            $sql = $this -> db -> query($sql);

            $idVenda = $this -> db -> lastInsertId();

            if($pg == '5'){ //mudar o número de acordo com o id associado ao pagamento 'cortesia'
                $status = '2';
                $pgLink = "/projetoBase/carrinho/compraRealizada";

                $this -> db -> query("UPDATE vendas SET status = 'status' WHERE id = '".$idVenda."'" );

            }elseif($pg == 7){
                //PagSeguro
                //integração com pagamentos 
                require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';

                $paymentRequest = new PagSeguroPaymentRequest();
                foreach($prods as $prod){
                    $paymentRequest -> addItem($prod['id'], $prod['nome'], 1, $prod['preco']);
                }
                $paymentRequest -> setCurrency("BRL");
                $paymentRequest -> setReference($idVenda);
                $paymentRequest -> setRedirectURL("http://localhost/projetoBase/carrinho/compraRealizada");
                $paymentRequest -> addParameter("notificationURL", "http://localhost/projetoBase/carrinho/notificacao");

                try{
                    $cred = PagSeguroConfig::getAccountCredentials();
                    $pgLink = $paymentRequest -> register($cred); 
                }catch(PagSeguroServiceException $e){
                    echo $e -> getMessage();
                } 
            }
            foreach($prods as $produtos){
                $sql = "INSERT INTO vendaproduto SET idVenda = '$idVenda', idProduto ='".$produtos['id']."', qtde = '1'";
                $sql = $this -> db -> query($sql);
            }

            //$_SESSION['carrinho'] = array();
            unset($_SESSION['carrinho']);

            return $pgLink;
        }

    }

?>