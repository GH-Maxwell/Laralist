<!DOCTYPE html>
<html lang="en" ng-app="laralist">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS files -->
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
        <script src="/js/task.js"></script> 
    </head>
    <body ng-controller="TasksController">

        <div class="container">
        
        <p>{{ getTasks(<?php echo "$list" ?>) }}</p>    

        <h2>Angular js attempt <small ng-if="remaining()">{{ remaining() }} Remaining</small></h2><hr>

            <input type="text" placeholder="Search Tasks" ng-model="search" class="form-control"></br>

            <ul>
                <li ng-repeat="task in tasks | filter:search">
                    <input type="checkbox" ng-model="task.status">{{ task.name }}
                </li>
            </ul>

            <form ng-submit="addTask()">
                <input type="text" placeholder="Add a task" ng-model="newTask" class="form-control"></br>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
    
        </div>

        <!-- JS files -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="/js/bootstrap.min.js"></script>    
    </body>
</html>

