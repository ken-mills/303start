<template>

<div id="contact">

    <div id="bio" class="row">

<!--

        <div class="col-xs-12 col-md-4">
            <div id="circle2" class="circle2"
            	style="background-image: url(./images/img5524a2.jpg)"></div>
        </div>

-->
        <div class="col-md-8 col-md-offset-2">

            <h2 class="text-primary">about 303start</h2>

            <p>{{message}}</p>

				<h4><strong>Contact 303start</strong></h4>
				<p style="margin-top: 10px">
					<a class="text-primary" href="mailto:ken@303start.com">ken@303start.com</a>
				</p>
				<br>

        </div>
    </div>
</div>
	
</template>

<script>
	export default {
		name: "contact",
		data: function(){
		  return{
		      message: '303start is the home of team303. team303 was created with the goal of making ' +
		       'performance management easier. many organizations want the same thing. ' +
		        'team303 has evolved into more than just a performance management tool. ' +
		         'it is an alternative resource for supervisors, managers, and leaders to engage contributors in today’s workplace. ' +
		          'team303 helps to build strong relationships between players and coaches.'
		  }
		}
	}
</script>

