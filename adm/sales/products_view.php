<?php
		$ProductsType = new ProductsType();
 		$Plants = new Plants();
		$plants_list = $Plants->getPlantsListSelect(); 
 		$Farms = new Farms();
		$farms_list = $Farms->getFarmsListSelect(); 
                $Brokers = new Brokers();
                $brokers_list = $Brokers->getListBrokers(); 
?>			
<br>
			<a onclick="openProducts();" class="btn btn-success desactivar">Agregar producto <i class="fa fa-plus-circle"></i></a>
<br><br><br>            
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" id="products_details">
                            
				

						<?php if(count($values['sales_products_detail'])>0):?>
							<?php foreach($values['sales_products_detail'] as $sales_products_details):?>
							<?php
									$Products = new Products();
									$products_data = $Products->getProductsById($sales_products_details);
							
							?>
                                                
                                                <div id='products_list_<?php echo $sales_products_details['id'];?>' class="well well-lg" >
                                                    <div class="table-responsive" >
                                                        <table class="table-bordered table-condensed table-hover table-striped">
                                                            <tr>
                                                                <th>Producto</th>
                                                                <th>Tipo</th>
                                                                <th>Cases</th>
                                                                <th>Packing</th>
																<th>Value</th>
																<th>Rate</th>
                                                                <th>Kgs</th>
                                                                <th>Amount</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type='hidden' name='id_product[<?php echo $sales_products_details['id'];?>]' value='<?php echo $sales_products_details['id_product']?>'> 
                                                                    <?php echo strtoupper($products_data['name']);?>

                                                                </td>
                                                                <td>
							
                                                                <?php
                                                                                $ProductsType = new ProductsType();
                                                                                $products_type_list = $ProductsType ->getListProductsTypeByIdProduct($sales_products_details['id_product']);


                                                                ?>  
                                                                        <select name='id_product_type[<?php echo $sales_products_details['id']?>]' id='id_product_type_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'id_product_type_<?php echo $sales_products_details['id'];?>','id_product_type')">
                                                                                <option value=''>...</option>
                                                                                <?php if(count($products_type_list)>0):?>
                                                                                        <?php foreach($products_type_list as $list):?>
                                                                                        <option value='<?php echo $list['id_product_type']?>' <?php if($list['id_product_type'] == @$sales_products_details['id_product_type']) echo "selected='selected'";?>><?php echo $list['name']?></option>
                                                                                        <?php endforeach;?>
                                                                                <?php endif;?>
                                                                        </select>
                                                                </td>
                                                                <td>
                                                                <input type='number' min="0" name='cases[<?php echo $sales_products_details['id']?>]' id='cases_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php echo $sales_products_details['cases']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'cases_<?php echo $sales_products_details['id'];?>','cases')"> 

                                                                </td>
                                                                <td>
                                                                    <input type='number' min="0" name='packing[<?php echo $sales_products_details['id']?>]' id='packing_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php if(isset($sales_products_details['packing'] ) and $sales_products_details['packing']!="")echo $sales_products_details['packing'];else echo "10";?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'packing_<?php echo $sales_products_details['id'];?>','packing')"> 

                                                                </td>
                                                                <td>
																	<input type='text' min="0" name='pack[<?php echo $sales_products_details['id']?>]' id='pack_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php if(isset($sales_products_details['pack'] ) and $sales_products_details['pack']!="")echo $sales_products_details['pack'];else echo "1.8";?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'pack_<?php echo $sales_products_details['id'];?>','pack')"> 
																	<select name='weight[<?php echo $sales_products_details['id']?>]' id='weight_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'weight_<?php echo $sales_products_details['id'];?>','weight')">
																		<option value="KGS" <?php if(isset($sales_products_details['weight'] ) and $sales_products_details['weight']=="KGS")echo "selected = 'selected'"?>>KGS</option>
																		<option value="LBS" <?php if(isset($sales_products_details['weight'] ) and $sales_products_details['weight']=="LBS")echo "selected = 'selected'"?>>LBS</option>
																	</select>
                                                                </td>
                                                                <td>
                                                                    <input type='number' step="0.01" min="0.00" name='rate[<?php echo $sales_products_details['id']?>]' id='rate_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php echo $sales_products_details['rate']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'rate_<?php echo $sales_products_details['id'];?>','rate')"> 
  
                                                                </td>
                                                                <td>
                                                                    <input type='text' min="0" readonly="readonly" name='quantity[<?php echo $sales_products_details['id']?>]' id='quantity_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php echo $sales_products_details['quantity']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'quantity_<?php echo $sales_products_details['id'];?>','quantity')"> 
 
                                                                </td>
                                                                <td>
                                                                    <input type='text' min="0"  step="0.01" readonly="readonly" name='amount[<?php echo $sales_products_details['id']?>]' id='amount_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['amount']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'amount_<?php echo $sales_products_details['id'];?>','amount')"> 
                                                                </td>
                                                                <td>
                                                                    <a onclick="deleteProductDetail(<?php echo $sales_products_details['id']?>)"  class="btn btn-danger desactivar">Eliminar</a> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Granja</th>
                                                                <th>Planta</th>

                                                                <th colspan="2">Precinto container</th>
                                                                <th colspan="2">Número container</th>
                                                                
                                                                <th>Broker</th>
                                                                <th colspan="2">Comisión</th>
                                                            </tr>
                                                       <tr>

                                                           <td>
                                                            <select name='id_farm[<?php echo $sales_products_details['id']?>]' id='id_farm_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'id_farm_<?php echo $sales_products_details['id'];?>','id_farm')">
                                                                <option value="">...</option>
                                                                <?php if(count($farms_list)>0):?>
                                                                    <?php foreach($farms_list as $list):?>
                                                                <option value="<?php echo $list['id_farm'];?>" <?php if($list['id_farm'] == @$sales_products_details['id_farm']) echo "selected='selected'"?>><?php echo $list['name'];?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            </select>
  
                                                           </td>
                                                           <td>
                                                            <select name='id_plant[<?php echo $sales_products_details['id']?>]' id='id_plant_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'id_plant_<?php echo $sales_products_details['id'];?>','id_plant')">
                                                                <option value="">...</option>
                                                                <?php if(count($plants_list)>0):?>
                                                                    <?php foreach($plants_list as $list):?>
                                                                <option value="<?php echo $list['id_plant'];?>" <?php if($list['id_plant'] == @$sales_products_details['id_plant']) echo "selected='selected'"?>><?php echo $list['name'];?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            </select>
   
                                                           </td>

                                                           <td colspan="2">
                                                            <input type='text' name='precinto[<?php echo $sales_products_details['id']?>]' id='precinto_<?php echo $sales_products_details['id']?>' size="10" autocomplete="off" value="<?php echo $sales_products_details['precinto']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'precinto_<?php echo $sales_products_details['id'];?>','precinto')">
   
                                                           </td>
                                                           <td colspan="2">
                                                            <input type='text' name='number[<?php echo $sales_products_details['id']?>]' id='number_<?php echo $sales_products_details['id']?>' size="10" autocomplete="off" value="<?php echo $sales_products_details['number']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'number_<?php echo $sales_products_details['id'];?>','number')">
 
                                                           </td>
                                                           <td>
                                                            <select name='id_broker[<?php echo $sales_products_details['id']?>]' id='id_broker_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'id_broker_<?php echo $sales_products_details['id'];?>','id_broker')">
                                                                <option value="">...</option>
                                                                <?php if(count($brokers_list)>0):?>
                                                                    <?php foreach($brokers_list as $list):?>
                                                                <option value="<?php echo $list['id_broker'];?>" <?php if($list['id_broker'] == @$sales_products_details['id_broker']) echo "selected='selected'"?>><?php echo $list['name'];?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            </select>
   
                                                           </td>
                                                           <td colspan="2">
                                                            <input type='text' name='comision[<?php echo $sales_products_details['id']?>]' id='comision_<?php echo $sales_products_details['id']?>' size="4" autocomplete="off" value="<?php echo $sales_products_details['comision']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'comision_<?php echo $sales_products_details['id'];?>','comision')">
   
                                                           </td>
                                                            </tr>
                                                        </table> 
                                                        
                                                    </div>

					
                                                </div>	
							<?php endforeach;?>
						<?php endif;?>
                        
                        </div>
			
<script>
function openProducts() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "products_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Productos');
			$('#myModal').modal('show');
		}
	});

}
function addProducts(id_product) {
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_product",id_sale: <?php echo $values['id_sale']?>,id_product: id_product},
		success: function(html){
		$('#products_details').append(html);
		$('#myModal').modal('toggle');
		}
	});

}

function deleteProductDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_product",id: id},
			success: function(){
				$("#products_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateSalesProductsDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		var id_product_type = $("#id_product_type_" + id).val();
		var cases = $("#cases_" + id).val();
		var packing = $("#packing_" + id).val();
		var pack = $("#pack_" + id).val();
		var quantity = $("#quantity_" + id).val();
		var rate = $("#rate_" + id).val();
		var amount = $("#amount_" + id).val();
		
		quantity = parseFloat(cases).toFixed(2) * (parseFloat(packing).toFixed(2) * pack);
		amount = parseFloat(quantity).toFixed(2) * parseFloat(rate).toFixed(2);
		amount = parseFloat(amount).toFixed(2);
		$("#quantity_" + id).val(quantity);
		$("#amount_" + id).val(amount);
		
		var column_id_quantity = "quantity_" + id;
		var column_name_quantity = "quantity";
		var column_id_amount = "amount_" + id;
		var column_name_amount = "amount";
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id,column_name:column_name,value:value,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id_quantity,column_name:column_name_quantity,value:quantity,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});	
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id_amount,column_name:column_name_amount,value:amount,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});
	}



</script>