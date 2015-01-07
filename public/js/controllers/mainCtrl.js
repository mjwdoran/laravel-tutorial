angular.module'mainCtrl', [])

//inject the Comment service into our controller
.controller('mainController', function($scope, $http, Comment) 
{
	//object to hold all the data for the new comment form
	$scope.commentData = {};

	//loading variable to show the spinning loading icon
	$scope.loading = true;

	/*	Get all the comments first and bind them to $scope.comments object
	Use the function we created in our service */

	//GET ALL COMMENTS ===========================
	Comment.get()
		.success(function(data) {
			$scope.comments = data;
			$scope.loading = false;
		});

	// Function to handle submitting the form

	//SAVE A COMMENT =============================
	$scope.submitComment = function () 
	{
		$scope.loading = true;

		// save the comment.  Pass in comment data from the form, use the function in our service
		Comment.save($scope.commentData)
			.success(function(data) 
			{
				//if successful, we'll need to refresh the comment list
				Comment.get()
					.success(function(getData) {
						$scope.comments = getData;
						$scope.loading = false;
					});

			})
			.error(function(data)
			{
				console.log(data);
			});
	};

	//Function to handle deleting a comment
	//DELETE A COMMENT ===========================
	$scope.deleteComment = function(id) {
		$scope.loading = true;

		//use the function we created in our service
		Comment.destroy(id)
			.success(function(data) {

				//if successful, we'll need to refresh the comment list
				Comment.get()
					.success(function(getData) {
						$scope.comments = getData;
						$scope.loading = false;
					});
			});
	};
});