<?php //include 'template/header.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <div class="row">
       <div class="col-12">
        <section class="riderApplication">
            <h2 class="display-4 blueDark">Application</h2>
            <p class="lead">If you would like to be considered for sponsorship,  please fill out the form below and we will respond to you as soon as possible.</p> 
    
            <form name="ridersupport" action="/ridersupportmail.php" method="post">
                <h4 class="mt-4 mb-3 blueMed">PERSONAL INFORMATION <span id="formMsg1"></span></h4>
                <div class="form-row mb-3">
                    <div class="col-xs-12 col-sm-4 col-md-4 mb-2">
                        <input class="form-control" id="Name" size="32" name="Name" placeholder="Full Name"  required/>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <input class="form-control" id="Phone" size="32" name="Phone" placeholder="Phone Number"  required/>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 mb-2">
                        <input class="form-control" id="Address" size="72" name="Address" placeholder="Address"  required/>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-xs-12 col-sm-5 col-md-5 mb-2">
                        <input class="form-control" id="City" size="72" name="City" placeholder="City" required/>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <input class="form-control" id="State" size="72" name="State" placeholder="State" required/>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 mb-2">
                        <input class="form-control" id="Zip" size="72" name="Zip" placeholder="Zip Code" required/>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-xs-12 col-sm-4 col-md-4 mb-2">
                        <input class="form-control" id="Country" size="72" name="Country" placeholder="Country" />
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 mb-2">
                        <input class="form-control" id="Email" size="32" name="Email" placeholder="Email" required/>
                    </div>
                </div>
                <h4 class="mt-4 mb-3 blueMed">RIDING INFORMATION <span id="formMsg2"></span></h4>
                <div class="form-row mb-3">
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <label for="type">Type of Riding&#58;</label>
                        <select class="form-control" id="type" name="type">
       			            <option value="Motocross">Motocross</option>
       			            <option value="Mini Moto">Mini Moto</option>
       			            <option value="Super Moto">Super Moto</option>
       			            <option value="Flat Track">Flat Track</option>
       			            <option value="Hill Climb">Hill Climb</option>
       			            <option value="Woods/Trail">Woods/Trail</option>
       			        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <label for="Make">Make&#58;</label>
                        <input class="form-control" id="Make" size="32" name="Make" />
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 mb-2">
                        <label for="Model">Model&#58;</label>
                        <input class="form-control" id="Model" size="32" name="Model" />
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 mb-2">
                        <label for="Year">Year&#58;</label>
                        <input class="form-control" id="Year" size="32" name="Year" />
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <label for="Years_racing">Years of Racing&#58;</label>
                        <input class="form-control" id="Years_racing" size="32" name="Years_racing" />
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 mb-2">
                        <label for="Age">Age&#58;</label>
                        <input class="form-control" id="Age" size="32" name="Age" />
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mb-2">
                        <label for="Race_number">Race Number&#58;</label>
                        <input class="form-control" id="Race_number" size="32" name="Race_number" />
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 mb-2">
                        <label for="Race_class">Race Class&#58;</label>
                        <input class="form-control" id="Race_class" size="32" name="Race_class" />
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-12 mb-2">
                        <label for="Comment">Additional Comments&#58;</label>
                        <textarea style="resize: verticle;" class="form-control" name="Comment" cols="52" rows="8" id="Comment"></textarea>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-12 mb-2">
                        <input class="btn" id="submitApp" name="" type="submit" value="Submit" />
                    </div>
                </div>
            
			    <input type="hidden" name="subject" value="Magic Mail - Rider Support" /> 
			    <input type="hidden" name="redirect" value="confirmation.html" />
			 </form><!-- END OF FORM -->
        </section><!-- END OF RIDERAPPLICATION SECTION -->
        </div><!-- END OF COLUMM WRAPPER -->
    </div><!-- END OF ROW -->
</div><!-- END OF FLUID CONTAINER -->
    
<?php //include 'template/footer.php'; ?>
<?php include 'includes/footer.php'; ?>