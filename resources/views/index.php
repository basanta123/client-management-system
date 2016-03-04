<!DOCTYPE html>
<html lang="en-US" ng-app="clientList">
    <head>
        <title>Client Management System</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Clients Data</h2>
        <div  ng-controller="clientsController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th>Date of Birth</th>
                        <th>Educational Background</th>
                        <th>Preferred Mode of Contact</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add')">Add New Client</button></th>
                    </tr>
                </thead>
                <tbody>
                  

                    <tr ng-repeat="client in clients">
                        <td>{{  client[0] }}</td>
                        <td>{{  client[1] }}</td>
                        <td>{{  client[2] }}</td>
                        <td>{{  client[3] }}</td>
                        <td>{{  client[4] }}</td>
                        <td>{{  client[5] }}</td>
                        <td>{{  client[6] }}</td>
                        <td>{{  client[7] }}</td>
                       <td>{{  client[8] }}</td>
                    </tr>

                </tbody>
                
            </table>
            <!-- End of Table-to-load-the-data Part -->

            <!-- Modal (Pop up when add new  button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmClient" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" 
                                        ng-model="client.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.name.$invalid && frmClient.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type = "radio" name = "gender"  id = "gender"value = "Male" ng-model="client.gender" ng-required="true">
                                        <label for = "Male">Male</label>
                                        <input type = "radio" name = "gender"  id = "gender"value = "Female" ng-model="client.gender" ng-required="true" /><label for = "Female">Female</label>
                                        <span class="help-inline" ng-show="frmClient.gender.$invalid && frmClient.gender.$touched">Gender field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="phone" name="phone" placeholder="Phone" 
                                        ng-model="client.phone" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.phone.$invalid && frmClient.phone.$touched">Phone field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control has-error" id="email" name="email" placeholder="Email" 
                                        ng-model="client.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.email.$invalid && frmClient.email.$touched">Email field should be valid</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="address" name="address" placeholder="Address" 
                                        ng-model="client.address" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.address.$invalid && frmClient.address.$touched">Address field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nationality</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nationality" name="nationality" placeholder="Nationality" 
                                        ng-model="client.nationality" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.nationality.$invalid && frmClient.nationality.$touched">Nationality field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" 
                                        ng-model="client.date_of_birth" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.date_of_birth.$invalid && frmClient.date_of_birth.$touched">Date of Birth field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Educational Background</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="education_background" name="education_background" placeholder="Educational Background" 
                                        ng-model="client.education_background" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmClient.education_background.$invalid && frmClient.education_background.$touched">Educational Background field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Preferred Mode of Contact</label>
                                    <div class="col-sm-9">
                                        <select name="preferred_mode_of_contact" class="form-control has-error" id="preferred_mode_of_contact" 
                                        ng-model="client.preferred_mode_of_contact" ng-required="true">
                                        <option value="">Select</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Email">Email</option>    
                                        </select>
                                        <span class="help-inline" 
                                        ng-show="frmClient.preferred_mode_of_contact.$invalid && frmClient.preferred_mode_of_contact.$touched">Preferred Mode of Contact field is required</span>
                                    </div>
                                </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate)" ng-disabled="frmClient.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/clients.js') ?>"></script>
    </body>
</html>