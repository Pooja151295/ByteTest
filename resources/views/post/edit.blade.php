<style>
	body {
	align-items: center;
	background-color: #000;
	display: flex;
	justify-content: center;
	height: 100vh;
	}

	.form {
	background-color: #15172b;
	border-radius: 20px;
	box-sizing: border-box;
	height: 500px;
	padding: 20px;
	width: 320px;
	}
	.title {
	color: #eee;
	font-family: sans-serif;
	font-size: 36px;
	font-weight: 600;
	margin-top: 30px;
	text-align: center;
	}

	.subtitle {
	color: #eee;
	font-family: sans-serif;
	font-size: 16px;
	font-weight: 600;
	margin-top: 10px;
	}

	.input-container {
	height: 50px;
	position: relative;
	width: 100%;
	}

	.ic1 {
	margin-top: 40px;
	}

	.ic2 {
	margin-top: 30px;
	}

	.input {
	background-color: #303245;
	border-radius: 12px;
	border: 0;
	box-sizing: border-box;
	color: #eee;
	font-size: 18px;
	height: 100%;
	outline: 0;
	padding: 4px 20px 0;
	width: 100%;
	}

	.cut {
	background-color: #15172b;
	border-radius: 10px;
	height: 20px;
	left: 20px;
	position: absolute;
	top: -20px;
	transform: translateY(0);
	transition: transform 200ms;
	width: 76px;
	}

	.cut-short {
	width: 50px;
	}

	.input:focus ~ .cut,
	.input:not(:placeholder-shown) ~ .cut {
	transform: translateY(8px);
	}

	.placeholder {
	color: #65657b;
	font-family: sans-serif;
	left: 20px;
	line-height: 14px;
	pointer-events: none;
	position: absolute;
	transform-origin: 0 50%;
	transition: transform 200ms, color 200ms;
	top: 20px;
	}

	.input:focus ~ .placeholder,
	.input:not(:placeholder-shown) ~ .placeholder {
	transform: translateY(-30px) translateX(10px) scale(0.75);
	}

	.input:not(:placeholder-shown) ~ .placeholder {
	color: #808097;
	}

	.input:focus ~ .placeholder {
	color: #dc2f55;
	}

	.submit {
	background-color: #08d;
	border-radius: 12px;
	border: 0;
	box-sizing: border-box;
	color: #eee;
	cursor: pointer;
	font-size: 18px;
	height: 50px;
	margin-top: 38px;
	// outline: 0;
	text-align: center;
	width: 100%;
	}

	.submit:active {
	background-color: #06b;
	}
</style>
	
	<div class="card">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2 class="title">Edit Your Post</h2>
				</div>
				
			</div>
		</div>
		<div>
			<form action="{{ route('post.update',$post->id) }}"	 method="POST">
				@csrf
				@method('PUT')
				<div class="input-container ic1">
					<label>Name:</label><br>
					<input class="input" type="text" name="post_name" value="{{ $post->post_name }}" class="form-control" placeholder="Name">
				</div>
				<div class="input-container ic1">
					<label>Discription:</label>
					<input class="input" type="text" name="post_details" value="{{ $post->post_details }}" class="form-control" placeholder="Name">
				</div>
				<div class="input-container ic1">
					<button class="submit" type="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>