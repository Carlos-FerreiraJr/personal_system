<?php
//requisicao da passra app/mage do magento 
require_once 'app/Mage.php';
require_once 'menudigital/class/Banco.php';
ini_set('display_errors', 1);


$sql = '';

$fromDate = date('Y-m-d H:i:s', strtotime('-4 day'));
//$toDate = date('Y-m-d H:i:s', strtotime('-7 day'));
$toDate = date('Y-m-d H:i:s', strtotime(now()));


    Mage::app();

    $orders = Mage::getModel('sales/order')->getCollection()
        ->addAttributeToFilter('created_at', array('from'=>$fromDate, 'to'=>$toDate));

    $ordersNumbers = array();
    foreach ($orders as $ord) {
//var_dump($ord);die();
        $ordersNumbers[] = $ord->getIncrementId();
        $clientes[] = $ord->customer_firstname;
        $customerIds[] = $ord->customer_id;
        $cnpjs[] = $ord->customer_taxvat;
        $enderecos[] = str_replace("\n", " ", $ord->getShippingAddress()->getData());
        $datas[] = $ord->created_at;
        $status[] = $ord->state;
        $status_label[] = $ord->getStatusLabel();
        $emails[] = $ord->customer_email;
        $telefone[] = $ord->getShippingAddress()->getTelephone();
        $payment_method[] = $ord->getPayment()->getMethodInstance()->getTitle();
        $customer_group[] = Mage::getModel('customer/group')->load($ord->getCustomerGroupId())->getCustomerGroupCode();
    }
    $i = 0;

    echo "Processando:\n";

    foreach($ordersNumbers as $orderNumber) {
        $order = Mage::getModel('sales/order')->loadByIncrementId($orderNumber);
    // get order total value
        $orderValue = number_format ($order->getGrandTotal(), 2, '.' , $thousands_sep = '');
    // get order item collection
        $orderItems = $order->getItemsCollection();

        echo "\n".$orderNumber;

        foreach ($orderItems as $item){

            $product_id = $item->product_id;
            $product_sku = $item->sku;
            $seller_id = Mage::getResourceModel('catalog/product')->getAttributeRawValue($product_id, 'vendido_entregue_por', '0');

            switch ($seller_id) {
                case '482': $seller = "Alliance Truck Parts"; break;
                case '13': $seller = "Bebidaria"; break;
                case '333': $seller = "Bev Group"; break;
                case '10': $seller = "BHR Gastronomia"; break;
                case '11': $seller = "BRFoods"; break;
                case '356': $seller = "Brico Bread"; break;
                case '343': $seller = "Canta Claro"; break;
                case '349': $seller = "Central Foods"; break;
                case '477': $seller = "Chef Meat"; break;
                case '357': $seller = "DB Brasil"; break;
                case '480': $seller = "Didio"; break;
                case '341': $seller = "Duga"; break;
                case '348': $seller = "Eaton"; break;
                case '352': $seller = "Elo Fruti"; break;
                case '359': $seller = "Epic"; break;
                case '5': $seller = "Forte Alimentos"; break;
                case '361': $seller = "Frigo Estrela"; break;
                case '355': $seller = "Frigocenter"; break;
                case '358': $seller = "Frimesa"; break;
                case '12': $seller = "Gavimax"; break;
                case '15': $seller = "GeneSeas"; break;
                case '340': $seller = "Germinou"; break;
                case '350': $seller = "Heinz"; break;
                case '452': $seller = "Hideal Distribuidora"; break;
                case '347': $seller = "IKS"; break;
                case '16': $seller = "IKS Embalagens"; break;
                case '444': $seller = "IKS Master"; break;
                case '346': $seller = "Ingram Micro"; break;
                case '451': $seller = "Kelma"; break;
                case '8': $seller = "Mega G"; break;
                case '9': $seller = "Menupontocom"; break;
                case '6': $seller = "Monte Carlo Alimentos"; break;
                case '337': $seller = "Mr Veggy"; break;
                case '475': $seller = "MSkin"; break;
                case '334': $seller = "Mun"; break;
                case '474': $seller = "Não Informado"; break;
                case '481': $seller = "Nap Hortifruti"; break;
                case '351': $seller = "Natural One"; break;
                case '335': $seller = "Nomoo"; break;
                case '354': $seller = "Novamix"; break;
                case '344': $seller = "Paru Brasil"; break;
                case '7': $seller = "PMG Atacadista"; break;
                case '338': $seller = "Positiva"; break;
                case '339': $seller = "Preá"; break;
                case '342': $seller = "Quero POC"; break;
                case '14': $seller = "Rio Quality"; break;
                case '360': $seller = "Roge Distribuidora"; break;
                case '455': $seller = "RTC"; break;
                case '454': $seller = "Seu Gil"; break;
                case '17': $seller = "Só Orgânicos"; break;
                case '345': $seller = "Theo Uniformes"; break;
                case '18': $seller = "Tiferet"; break;
                case '19': $seller = "Top Service"; break;
                case '336': $seller = "Vida Veg"; break;
                case '453': $seller = "Vila Nova"; break;
                case '450': $seller = "WRCL Distribuidora"; break;
            }

            $marca = Mage::getResourceModel('catalog/product')->getAttributeRawValue($product_id, 'marca', '0');
            $fabricante = Mage::getResourceModel('catalog/product')->getAttributeRawValue($product_id, 'fabricante', '0');

            $product_name = $item->getName();
            $price = number_format($item->getPrice(), 2,'.', '');
            $qty = (int)$item->qty_ordered;

            if($item->qty_invoiced == '0.0000') {
            $qty = $item->qty_ordered;
            $total = number_format($item->row_total, 2, '.','');
            } else {
            $qty = $item->qty_invoiced;
            $total = number_format($item->row_invoiced, 2, '.','');
            }

            $_product = Mage::getModel('catalog/product')->load($product_id);
            $cats = $_product->getCategoryIds();
            $category_id = $cats[0]; // just grab the first id
            $category = Mage::getModel('catalog/category')->load($category_id);
            $category_name = $category->getName();

            $clientes = $clientes[$i];
            $clientes = str_replace("'", "", $clientes);

            $rua = $enderecos[$i]['street'];
            $rua = str_replace("'", "", $rua);
            $cidade = $enderecos[$i]['city'];
            $cep = $enderecos[$i]['postcode'];


            $sql = "SELECT DISTINCT * FROM pedidos WHERE PedidoMagento = '".$orderNumber."' AND SKU = '".$product_sku."' ;";

            $Banco = new Banco();
            $return_select = $Banco->select($sql);
            $return_select_order = $return_select['dados']['0']['1'];
            $return_select_status = $return_select['dados']['0']['23'];

        //var_dump($return_select_order);
        //var_dump($return_select_status);die();

            if ($return_select_order == $orderNumber) {
                
                if ($return_select_status == $status_label[$i]) {
                    echo ".";
                }else{
                    $sql = "UPDATE pedidos SET 
                        Status = '".$status[$i]."', 
                        StatusLabel = '".$status_label[$i]."' , 
                        Cliente = '".$clientes."' , 
                        seller = '".$seller."', 
                        marca = '".$marca."', 
                        fabricante = '".$fabricante."' 
                        WHERE PedidoMagento = '".$orderNumber."' AND SKU = '".$product_sku."' ;";

                        $Banco = new Banco();
                        $return_update = $Banco->update($sql);
                        if ($return_update) {
                            echo "\n".$orderNumber ." Atualizando status";
                        }else{
                            echo "\n".$orderNumber ." erro ao atualizar no banco";
                        }
                }
                
                        
            } else {

            $sql = "INSERT INTO 
                    pedidos 
                    (
                        PedidoMagento,
                        Data,
                        Status,
                        Cliente,
                        FormadePagamento,
                        Grupodocliente,
                        IDCliente,
                        CNPJ,
                        Email,
                        Telefone,
                        Endereco,
                        Cidade,
                        CEP,
                        Produto,
                        SKU,
                        seller,
                        marca,
                        fabricante,
                        Qtd,
                        Unitario,
                        Total,
                        TotaldoPedido,
                        StatusLabel
                    ) VALUES (
                        '".$orderNumber."', 
                        '".$datas[$i]."', 
                        '".$status[$i]."', 
                        '".$clientes."', 
                        '".$payment_method[$i]."', 
                        '".$customer_group[$i]."', 
                        '".$customerIds[$i]."', 
                        '".$cnpjs[$i]."', 
                        '".$emails[$i]."', 
                        '".$telefone[$i]."', 
                        '".$rua."', 
                        '".$cidade."', 
                        '".$cep."', 
                        '".$product_name."', 
                        '".$product_sku."', 
                        '".$seller."', 
                        '".$marca."', 
                        '".$fabricante."', 
                        '".$qty."', 
                        '".$price."', 
                        '".$total."', 
                        '".$orderValue."', 
                        '".$status_label[$i]."'
                    ); ";
        //var_dump($sql);

                $Banco = new Banco();
                $return_insert = $Banco->inserir($sql);
                if ($return_insert) {
                    echo "\n".$orderNumber ." nova linha";
                }else{
                    echo "\n".$orderNumber ." erro ao inserir no banco";
                }
                
            }
        //echo ".";
        }
        $i++;
    }

