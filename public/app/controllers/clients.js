app.controller('clientsController', function($scope, $http, API_URL) {

    //retrieve clients listing from API
    $http.get(API_URL + "client")
            .success(function(response) {
                $scope.clients = response;

            });
    
    //show modal form
    $scope.toggle = function(modalstate) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Client";
                break;
            
            default:
                break;
        }
        
        $('#myModal').modal('show');
    }

    //save new record 
    $scope.save = function(modalstate) {
        var url = API_URL + "client";
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.client),

            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            
        });
    }

    
});