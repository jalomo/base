<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>jalomo</title>
        <?php echo link_tag('statics/css/theme/bootstrap/css/bootstrap.min.css'); ?>
        <?php echo link_tag('statics/css/theme/bootstrap/css/bootstrap-responsive.min.css'); ?>
        <?php echo link_tag('statics/css/theme/css/theme.css'); ?>
        <?php echo link_tag('statics/css/theme/images/icons/css/font-awesome.css'); ?>
        
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                 <?php if(isset($menu_header)): ?>
                  <?php echo $menu_header; ?>
                 <?php endif; ?>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                           <?php if(isset($aside)): ?>
                             <?php echo $aside; ?>
                             <?php endif; ?>
                            <!--/.widget-nav-->
                            
                            
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="row">
                                <?php if(isset($content)): ?>
                                    <?php echo $content; ?>
                                <?php endif; ?>
                                
                            </div>
                            <!--/#btn-controls-->
                            
                            <!--/.module-->
                            
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2015 jalomo -  </b>All rights reserved.
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/jquery-1.9.1.min.js'; ?>"></script>

        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/jquery-ui-1.10.1.custom.min.js'; ?>"></script>

        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/jquery-ui-1.10.1.custom.min.js'; ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/bootstrap/js/bootstrap.min.js'; ?>"></script>

        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/flot/jquery.flot.js'; ?>"></script>

        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/jquery.flot.resize.js'; ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/datatables/jquery.dataTables.js'; ?>"></script>

        <script type="text/javascript" src="<?php echo base_url().'statics/css/theme/scripts/common.js'; ?>"></script>
        
      
    </body>
