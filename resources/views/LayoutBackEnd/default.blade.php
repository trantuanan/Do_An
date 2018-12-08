<!DOCTYPE html>
<html>
@include('LayoutBackEnd.head')
<body>
    <div id="container">
    	@include('LayoutBackEnd.headerTop')
    	<div class="row-backend">
    		<div class="col-header">
    			@include('LayoutBackEnd.header')
    		</div>
    		<div class="col-content">
    			@yield('content')
    		</div>
    	</div>
    </div>
</body>
</html>