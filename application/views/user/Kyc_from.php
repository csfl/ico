
<script>
    $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
     <div class="wrapper">       
        <div class="main-panel">
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                                <?php
                                if($this->session->flashdata('flashdata')){
                                ?>
                                <div class="col s12 m2">
                                      <div class="alert alert-success">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span>
                                        <?php
                                            echo $this->session->flashdata('flashdata');
                                        ?>
                                            
                                        </span>
                                    </div>
                                </div>
                                <?php
                                }
                                if(isset($flash))
                                {
                                    echo $flash;
                                }
                                if(isset($error))
                                {
                                    foreach ($error as  $value) 
                                    {
                                        # code...
                                        echo $value;
                                    }
                                }
                                if(isset($return->status) == 1)
                                {
                                  ?>
                                   <div class="col s12 m2">
                                      <div class="alert alert-success">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span>
                                         Verification Failed try again!
                                        </span>
                                    </div>
                                </div>
                                  <?php   
                                }
                                ?>
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">KYC</h4>
                                </div>
                                <div class="card-content">
                                <form method="post" action="<?=base_url('kyc')?>" enctype="multipart/form-data">
                                        <div class="row" style="margin:1px;">
                                            <div class="col-md-12 ">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('f_name'); ?>" id="__tkn_amt__" name="f_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin:1px;">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('l_name'); ?>" name="l_name" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <p style="color: #f28c32 !important">Please Upload Images less than 1.5 MB</p>
                                            <p style="color: #f28c32 !important">Only JPG, JPEG AND GIF are accepted</p>
                                                <div class="input-group">
                                                <label class="input-group-btn">

                                                    <span class="btn" style="background-color: #B3B7C4 ">
                                                     <input type="file" style="" multiple name="document">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Add Document" readonly>
                                            </div>                                               
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <!-- <div class="form-group label-floating">
                                                    <label class="control-label">Document</label>
                                                    <input type="file" class="form-control" name="document" value="">
                                                </div> 
                                                <div class="form-group has-default form-file-upload form-file-simple">
                                                   <input type="text" class="form-control inputFileVisible" placeholder="Add Document">
                                                   <input type="file" class="inputFileshow" name="document">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn" style="background-color: #B3B7C4 ">
                                                     <input type="file" multiple name="selfie">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Add a Selfie" readonly>
                                            </div>                                               
                                            </div>
                                        </div>
                                        <div class="row" style="text-align: center;">
                                            <div class="col-md-12">
                                                 <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="checkbox" value="1"> Not a U.S. citizen
                                            </label>
                                        </div>
                                                <!-- <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                   I'm an accredited U.S. investor
                                                    <input type="checkbox" class="form-control" name="checkbox" value="1">
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                        <input type="submit" name="submit" class="btn" value="submit" style="background-color: black;text-align: center;">
                                    </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#__tkn_amt__").on("keyup",function(){
           var token_amount = $(this).val();
           eth_charge = 0.001;
           var total_eth_charges = token_amount*eth_charge;
           $("#eth_charge").val(parseFloat(total_eth_charges));
        });
    });
    
</script>
