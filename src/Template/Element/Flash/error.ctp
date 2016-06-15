<!--div class="message error" onclick="this.classList.add('hidden');"></div-->
<div class="alert alert-danger alert-dismissable" onclick="this.classList.add('hidden');" >
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	<?= h($message) ?>
</div>
