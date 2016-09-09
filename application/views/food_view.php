<!DOCTYPE html >
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Food Random</title>
<link rel="shortcut icon" href="http://www.livejournal.com/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
<script type="text/javascript">
function userController($scope,$http) {
     $scope.foods = [];
     $scope.class = "success";
     $scope.f_id = 0;
     $http.get('<?php echo site_url('food/get_list'); ?>').success(function($data){ $scope.foods=$data; });

     $scope.randomFood2 = function(){
	    if ($scope.class === "success")
			$scope.class = "info";
	    else
			$scope.class = "success";

		console.log("posting data....");
	    $http({
	        method : 'GET',
	        url : '<?php echo site_url('food/post_random'); ?>',
	        headers: {'Content-Type': 'application/json'},
	        data : {"fff":"bar","property":"value"}
	    }).success(function(data) {
	         console.log(data);     
	    });
		
	};

	$scope.randomFood = function(){
	    var f = $scope.foods[Math.floor(Math.random()*$scope.foods.length)];
	    $scope.f_id = f.food_id.toString();
	};

	$scope.checkValue = function(id){
		return $scope.f_id.toString() === id.toString();
	};
}
</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body ng-app ng-controller="userController">
<!-- ng-app : which tells the Angular framework to parse data from this div -->

<div class="container">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                สถานที่
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
					        <tr ng-repeat="food in foods">
					        	<td ng-class="{'success': checkValue({{food.food_id}})}">{{food.food_name}}</td>
					        </tr>
					      </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

        <button type="button" class="btn btn-primary btn-lg btn-block" ng-click="randomFood()">Random</button>
    </div>
</div>


 
</body>
</html>