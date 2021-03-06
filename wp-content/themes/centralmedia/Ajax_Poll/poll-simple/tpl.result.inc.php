<?php $poll =& $this->poll; ?>
<?php include( "css/style.inc.php" ); ?>

<div class='poll-result <?php echo $poll->prt->getTClassName(); ?>' style='display:none;'>
<div class='poll-inner'>

<form class='poll-form'>

<div class='poll-title'>
	<?php echo $poll->attr( "title" ); ?>
</div>

<!-- [BEGIN] Looping through all the items -->
<div style='margin-bottom:20px;'>
<table class='poll-table' border='0' cellpadding="0" cellspacing="0" width='100%'>
<?php foreach( $poll->getAllItems() as $item ) { ?>
<tr>
	<td width='50' align='right' class='poll-caption-cont'>
		<span <?php if ( $item->isVoted() ){ ?> style='font-weight:bold;' <?php } ?>>
		<?php echo $item->getName(); ?>
		</span>
	</td>
	<td width='8'></td>
	<td align='left'>
		<div><div class='ap-bar poll-bar' ap-wratio='<?php echo $item->getWRatio(); ?>'></div></div>
	</td>
	<td width='8'></td>
	<td width='40' align='right' ><?php echo $item->getPercent(1); ?>%</td>
	<td width='8'></td>
	<td width='30' align='right'><?php echo $item->getCount(); ?></td>
</tr>
<?php } ?>
</table>
</div>
<!-- [END] Looping through all the items -->

<!-- [BEGIN] Show total vote counts -->
<div style='text-align:right;margin-bottom:20px;'>
	<span style='font-weight:bold;'>
		<?php echo $poll->attr( "msg-total" ); ?>
		<?php echo $poll->getTotal(); ?>
	</span>
</div>
<!-- [END] Show total vote counts -->

<?php if ( $poll->ended() ): ?>
<div class='poll-time-msg'>
	<?php echo $poll->attr( "msg-ended" ); ?>
</div>
<?php else: ?>
<!-- [BEGIN] Back button -->
<div class='ap-ref-tipbox' style='text-align:center;margin-bottom:20px;'>
	<button class="ap-front poll-button waves-effect waves-light btn">
		<?php echo $poll->attr( "msg-return" ); ?>
	</button>
</div>
<!-- [END] Back button -->
<?php endif; ?>

<input type='hidden' name='msg-thank-you' value='<?php echo $poll->attr( "msg-thank-you" ); ?>' />
</form>

</div>
</div>
