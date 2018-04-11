<div class="wrapper" style="padding: 40px;">
<div class="main-panel">
		<!-- main content -->
	       <div id="main_content" class="col-sm-8">
	       <!-- page heading -->
           <div class="card"> 
                         <div class="card-header" data-background-color="purple">
                                    <h4 class="title"> RECEIVE</h4>
                                </div>
                            <div class="boxed bg--secondary boxed--lg boxed--border">
                                <?php
                            if(isset($flash))
                            {
                                echo $flash;
                            }
                            ?>
                           
                            <?php
                            if(count($address3) > 1)
                            {
                                ?>
                                <div id="view_form" class="card card-1 boxed boxed--sm boxed--border">
                                <a class="btn btn--primary" id="add_adrs" href="<?=base_url('user_address/add_eth_add')?>">
                                    <span class="btn__text">Add Ethereum Address</span>
                                </a>
                                </div>
                                <?php
                            }
                            ?> 
                                <?php
                                $i = 0;
                                foreach($address3 as $key=>$add){
                                    $i++;
                                    if($add->coin_type == 'e'){
                                    ?>
                                    
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&amp;data=<?= $add->address; ?>" style="width: 50%;padding:20px;" class="center-block"><br /><br />
                                    <strong style="padding: 20px;">Wallet Address</strong> 
                                    <div class="form-group label-floating is-empty col-sm-offset-2">
                                                <input type="text" value="<?=$add->address; ?>" class="form-control" id="refferal_code" name="token_amount" placeholder="" style="padding: 20px;margin: 10px;width:95%;" readonly>
                                                 <input type="submit" name="submit" class="btn btn-info pull-right" value="Copy Address" onclick="myFunction()" style="margin-right:5%;">
                                            </div>

                                    <?php
                                    }
                                }
                                ?>

                                
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <script>
function myFunction() {
  var copyText = document.getElementById("refferal_code");
  copyText.select();
  document.execCommand("Copy");
}
</script>
                </div>

