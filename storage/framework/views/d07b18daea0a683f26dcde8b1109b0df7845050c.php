<div>
	<div>
    <form action="store" method="POST">
			<?php echo csrf_field(); ?>
			<table>
                <tr>
                    <td>
                        <label>Name:</label>
                        <input type='text' name="post_name" placeholder="enter name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Discription:</label>
                        <input type='text' name="post_details" placeholder="post details">
                    </td>
                </tr>
			</table>	
			<button type="btn btn-success">Submit</button>
		</form>

	</div>
</div><?php /**PATH C:\xampp\htdocs\ByteTest\resources\views/create.blade.php ENDPATH**/ ?>