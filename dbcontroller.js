
	var myapp=angular.module('myapp', []);//ทำงานในส่วนของกรอบของ app ที่เรากำหนด
	myapp.controller('showdatacontroller', function($scope,$http) {//แสดงข้อมูลสินค้าใน controller ชื่อ showdatacontroller
	getData(); //ทำงานเมื่อเพจโหลด เรียกใช้ฟังก์ชั่น getData
	$scope.sData= '';
	 // $scope.showData = [];
	 function getData(){//สร้างฟังก์ชั่น getData เพื่อแสดงรายการสินค้า
		$http.get("showpd.php").success(function(data){
		$scope.showData = data;
		console.log($scope.showData);
	});
	}
	 });