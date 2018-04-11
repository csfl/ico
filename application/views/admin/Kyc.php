<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="current">KYC</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
          <?php
            if(isset($flash))
            {
                echo $flash;
            }
            ?>
                
          <!--<a href="<?=base_url('admin/package_create')?>" class="btn btn-danger">Create Package</a>-->
            <div class="span12">
            </div>

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>KYC manage</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Identity Card</th>
                            <th>ID card back</th>
                            <th>U.S.citizen</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($return->result() as  $row) 
                        {
                            ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><?=$row->first_name?></td>
                                <td><?=$row->last_name?></td>
                                <td><a href="<?=base_url()?>public/uploads/kyc/<?=$row->identity_card?>" target="_blacnk" style="color: #08c;">View Identity Card</a></td>
                                <td><a href="<?=base_url()?>public/uploads/kyc/<?=$row->photo_id?>" target="_blacnk" style="color:#08c;">View Photo</a></td>
                                <td><?php if($row->flag == '1'){echo "Yes";}else{echo "No";}
                                ?></td>
                                <td>
                                <a href="<?=base_url('admin/kyc_verified/').$row->id.'/2'?>"  class="btn btn-success btn-sm">Verified</a>
                                <a href="<?=base_url('admin/kyc_verified/').$row->id.'/1'?>"  class="btn btn-danger btn-sm">Block</a>
                                </td>
                            </tr>
                                       
                            <?php
                        }
                        ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>