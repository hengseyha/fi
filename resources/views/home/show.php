
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview</title>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/custom.css?v=<?php echo time(); ?>">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body >
  
<div id="app">
	<nav class="navbar top-nav navbar-toggleable-sm navbar-inverse bg-inverse">
	    <div class="container d-flex flex-row flex-md-nowrap flex-wrap">
	         <ul class="navbar-nav">
                <a class="nav-item font-sr" href="/lang/hi">
                	<?php echo __('page.kh'); ?>
            	</a>
            	&nbsp;|&nbsp;
            	<a class="nav-item" href="/lang/en">
                	EN
            	</a>
	        </ul>

		    <div class="hidden-md-up w-100"></div>
	    </div>
	</nav>

<?php foreach($questions as $key => $question): ?>
	
<transition name="slide" >
	<template v-if="step === <?php echo ($key+1) ?>">
		<div class="app-modelx">
			<div class="app-model-contentx">
			<div class="row fit">
				<div class="col-md-3 text-center">
					<img class="img-fluid" src="<?php echo optional($question->image)->path(); ?>">
				</div>
				<div class="col-md-9">

				<div class="full-content">			
				<p class="title font-sr">
					<?php echo ($key+1) ?>
					<?php echo $question->{__('page.title')} ?>
				</p>
				<ul class="model-list-group">
				<?php if($question->type == 1): ?>
						<?php foreach($question->answers as $index => $answer): ?>
							<div>
							<li>
								<span class="gat"><?php echo ($index+1); ?></span>
							</li>
							<li>
								<input
									class="checkbox"
									id="<?php echo $answer->id; ?>"
									type="radio"
									value="<?php echo $answer->point; ?>"
									v-model="registration.question<?php echo ($key+1); ?>"
								>
								<label for="<?php echo $answer->id; ?>" @click="next">
									
									<span class="font-sr"><?php echo $answer->{__('page.answer_title')}; ?></span>
								</label>
							</li>
							</div>
						<?php endforeach ?>
				<?php else: ?>
					<?php foreach($question->answers as $index => $answer): ?>
						<div>
							<li>
								<span class="gat"><?php echo ($index+1); ?></span>
							</li>
						<li>
							<input
								class="checkbox"
								id="<?php echo $answer->id; ?>"
								type="checkbox"
								value="<?php echo $answer->point; ?>"
								v-model="registration.question<?php echo ($key+1); ?>"
							>
							<label for="<?php echo $answer->id; ?>">
								
								<span class="font-sr"><?php echo $answer->{__('page.answer_title')}; ?></span>
							</label>
						</li>
						</div>
					<?php endforeach ?>
					<div class="text-right">
						<a href="#" @click="next" class="btn btn-primary font-sr">
							<?php echo __('page.next'); ?>
						</a>
					</div>
				<?php endif?>
				</ul>
			</div>
			</div>
			</div>
			</div>
		</div>
	</template>
</transition>
<?php endforeach; ?>
<transition name="slide" >
<template v-if="step === 6">
<div class="app-modelx">
	<div class="app-model-contentx">
		<div class="row fit">
			<div class="col-md-3">
				<img class="img-fluid" :src="'/uploads/'+ answer.image.path">
			</div>
			<div class="col-md-9">
				<div>
					<p class="title font-sr">
						{{ answer.<?php echo __('page.result'); ?> }}
					</p>
					<ul class="model-list-group">
						<li>
							<input
								class="checkbox"
								id="asd"
								type="radio"
								value="asd"
							>
							<label for="asd">
								<span class="gat">1</span>
								<span class="font-sr">
									View all clinics
								</span>
							</label>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
</transition>
	<nav class="navbar fixed-bottom navbar-toggleable-sm navbar-inverse bg-inverse">
	    <div class="container d-flex flex-row flex-md-nowrap flex-wrap">
	         <ul class="navbar-nav">
	            <li class="nav-item">
	                <div class="nav-item font-sr">{{ stepLength }} of {{ questionLength }} 
	                	<?php echo __('page.answer'); ?></div>
	            </li>
	        </ul>

		    <div class="d-flex ml-auto" v-if="step > 1">
		         <ul class="navbar-nav">
		            <li class="nav-item">
		                <a class="nav-link font-sr" @click.prevent="previous" href="#">
		                	<?php echo __('page.back'); ?>
		                </a>
		            </li>
		        </ul>
		    </div>

		    <div class="hidden-md-up w-100"></div>
	    </div>
	</nav>
</div>

<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.min.js"></script>
<script>
	new Vue({
	  el: '#app',
	  data: () => ({
	      step: 1,
	      isActive: false,
	      questions: [],
	      answers: [],
	      answer: {},
	      registration: {
	        question1: [],
	        question2: [],
	        question3: [],
	        question4: [],
	        question5: [],
	      }
	  }),
	  methods:{
	  	next(){
	  		if(this.step <= this.stepLength){
	  			setTimeout(() => {
				   this.step++
				}, 300)
	  		}

	    	let values = Object.values(this.registration).filter((key) => {
	    		return key !== null
	    	})

			var total = [].concat
	    			.apply([], values)
	    			.reduce(function(a, b) { return +a + +b });

	    	this.answer = this.answers.filter((key, item) => {
	    		return total >= key.from && total <= key.to
	    	})[0]
	  	},
	  	previous(){
	  		if(this.step >= 1){
	  			this.step--
	  		}
	  	},
	    submit() {
	    	let values = Object.values(this.registration).filter((key) => {
	    		return key !== null
	    	})

	    	console.log(values)

	    	var total = [].concat
	    			.apply([], values)
	    			.reduce(function(a, b) { return +a + +b });

	    	this.answer = this.answers.filter((key, item) => {
	    		return total >= key.from && total <= key.to
	    	})[0]
	    }
	  },
	  mounted(){
	  	this.questions = <?php echo $questions->toJson() ?>

	  	this.answers = <?php echo $results->toJson() ?>

	  },
	  computed: {
	  	stepLength(){
	  		return this.step <= this.questions.length ? this.step : this.questions.length
	  	},
	  	questionLength(){
	  		return this.questions.length
	  	}
	  }
	})
</script>
</body>
</html>
