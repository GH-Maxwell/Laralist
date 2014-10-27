angular.module('laralist', []).controller('TasksController', ['$scope','$http', function($scope, $http) {
  	
  	$scope.getTasks = function() {

		//$scope.tasks = tasks;
		$http.get('lists/1/tasks').success(function(tasks){
			$scope.tasks = tasks;
		});

	}

	$scope.remaining = function() {
		var count = 0;

		angular.forEach($scope.tasks, function(task) {
			count += task.status ? 0 : 1;
		});

		return count;

	}

	$scope.addTask = function() {
		$scope.tasks.push({
			name: $scope.newTask,
			status: false
		});
		$scope.newTask = '';
	}

}]);