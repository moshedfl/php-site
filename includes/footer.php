<script>
	$(document).ready(function(){
		$('#scroll-top').on("click",function(){
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		})
	})
</script>

<style>
    #scroll-top {
        display: block;
        width: 43px;
        height: 44px;
        background: url(../includes/icons/scroll-top.png) no-repeat;
        position: fixed;
        right: 10%;
        bottom: 15px;
        border-radius: 3px;
    }
</style>

<div id="scroll-top" ></div>