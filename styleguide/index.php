<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	</head>
	<body>
		<section class="row">
			<h1>Grid</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>The grid is your scaffolding</strong>. Containers will fit into these grids depending on how they are constructed. The grid is also your key to creating a responsive block, as you can specify how many columns a container takes up at small, medium and large screen sizes, as well as their visibility.</p>
				<hr>
			</div>
			<div class="background-subtle text-center small-12">
				.small-12
			</div>
			<div class="background-neutral text-center text-white small-12 medium-8">
				.small-12 .medium-8
			</div>
			<div class="background-subtle text-center small-4 medium-6">
				.small-4 .medium-6
			</div>
			<div class="background-neutral text-center text-white small-4 medium-6">
				.small-4 .medium-6
			</div>
			<div class="background-subtle text-center small-4 medium-6">
				.small-4 .medium-6
			</div>
			<div class="background-neutral text-center text-white small-4 medium-6">
				.small-4 .medium-6
			</div>
			<div class="background-subtle text-center small-3 medium-6 columns">
				.small-3 .medium-6 .columns
			</div>
			<div class="background-neutral text-center text-white small-3 medium-6 columns">
				.small-3 .medium-6 .columns
			</div>
			<div class="background-subtle text-center small-3 medium-6 columns">
				.small-3 .medium-6 .columns
			</div>
			<div class="background-neutral text-center text-white small-3 medium-6 columns">
				.small-3 .medium-6 .columns
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Type</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>Type heirarchy</strong> and consistent use of the available type treatments will help users grasp your content better. They wont be confused which of your contents are <h4 class="display-inline">headers</h4>, <a href="">links</a>, <strong>strong content</strong>, <em>emphasized content</em>, <code class="display-inline">code</code>, or normal text.</p>
				<hr>
			</div>
			<div class="small-12 medium-8 medium-offset-2">
				<h1>Heading 1</h1>
				<h2>Heading 2</h2>
				<h3>Heading 3</h3>
				<h4>Heading 4</h4>
				<h5>Heading 5</h5>
				<h6>Heading 6</h6>
				<p>Body copy</p>
				<a href="">Link</a>
				<blockquote>This is a blockquote.</blockquote>
				<blockquote class="em">This is an italicized blockquote.</blockquote>
			</div>
			<hr>
			<h1>Buttons</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>This is your standard action element.</strong> Using buttons and being consistent in their context will point your users to things they need to do on your site.</p>
				<hr>
			</div>
			<div class="small-12 medium-8 medium-offset-2">
				<h3>Basic Buttons</h3>
				<a href="" class="button">Primary Button</a>
				<a href="" class="button neutral">Secondary Button</a>
				<br><br>
				<a href="" class="button success">Success</a>
				<a href="" class="button warning">Warning</a>
				<a href="" class="button error">Error</a>
				<br>
				<br>
				<a href="" class="button white">White</a>
				<a href="" class="button disabled">Disabled</a>
				<br>
				<br>
				<a href="" class="button">Regular</a>
				<a href="" class="button small">Small</a>
				<a href="" class="button tiny">Tiny</a>
				<br>
				<br>
				<a href="" class="button full">Full Width</a>
				<hr>
			</div>
			<div class="small-12 medium-8 medium-offset-2">
				<h3>Button Groups</h3>
				<div class="button-group">
					<a href="" class="button">Button A</a>
					<a href="" class="button warning">Button B</a>
					<a href="" class="button success selected">Button C</a>
				</div>
				<div class="button-group">
					<a href="" class="button white">Button A</a>
					<a href="" class="button white">Button B</a>
					<a href="" class="button white selected">Button C</a>
				</div>
				<hr>
			</div>	
			<div class="small-12 medium-8 medium-offset-2">
				<h3>Dropdowns</h3>
				<div class="dropdown">
					<a href="" class="button dropdown-toggle">Dropdown &#9662;</a>
					<ul class="dropdown-menu">
						<li><a href="">Option A</a></li>
						<li><a href="">Option B</a></li>
					</ul>
				</div>
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Labels</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>These are not buttons.</strong> Labels are for non-actionable but useful information. They are commonly used to call attention to states like <span class="label-pill success">New</span>, <span class="label-pill warning">Expiring</span>, <span class="label-pill error">Overdue</span> and the like.</p>
				<hr>
			</div>
			<div class="small-12 medium-8 medium-offset-2">
				<span class="label-pill">Neutral</span>
				<span class="label-pill success">Success</span>
				<span class="label-pill warning">Warning</span>
				<span class="label-pill error">Error</span>
				<br>
				<br>
				<span class="label-pill">Round Neck</span>
				<span class="label-pill success">New</span>
				<span class="label-pill warning">Ending Soon</span>
				<span class="label-pill error">Out of Stock</span>
				<br>
				<br>
				<span class="label-pill hollow">Round Neck</span>
				<span class="label-pill hollow success">New</span>
				<span class="label-pill hollow warning">Ending Soon</span>
				<span class="label-pill hollow error">Out of Stock</span>
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Content Box</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>This is your most versatile element.</strong> These boxes adjust to the grid and can accommodate various content types &ndash; images, video, text, buttons, forms. Content boxes allow you to group and separate various types of information to present it better. Be creative with it, but remember to keep things simple.</p>
				<hr>
			</div>
			<div class="small-12">
				<div class="card small-12 medium-4 large-3">
					<div class="card-container">
						<div class="card-header">
							Hello!
						</div>
						<div class="card-body">
							<p>Body text here.</p>
							<a href="" class="button success">Yay!</a>
						</div>
					</div>
				</div>
				<div class="card small-12 medium-4 large-3">
					<div class="card-container">
						<div class="card-header">
							<small>22 views</small>
						</div>
						<div class="card-body">
							<div class="table-data">
								<div class="data-set">
									<div class="label">Price</div>
									<div><strong>Php 499</strong></div>
								</div>
								<div class="data-set">
									<div class="label">Artist</div>
									<div><a href="" class="button tiny neutral"><strong>Chaks</strong></a></div>
								</div>
								<div class="data-set">
									<div class="label">Like this shirt?</div>
									<div><a href="" class="button tiny white">Buy This</a></div>
								</div>
								<div class="data-set">
									<div class="label">Date Submitted</div>
									<div>March 28, 2015</div>
								</div>
								<div class="data-set">
									<div class="label">Style</div>
									<div><a href="">Round Neck</a></div>
								</div>
							</div>
						</div>
						<div class="card-actions">
							<a href="" class="button white small full">More Details</a>
						</div>
					</div>
				</div>
				<div class="card small-12 medium-4 large-3">
					<div class="card-container">
						<div>
							<img src="http://placehold.it/400x300" alt="">
						</div>
						<div class="card-body item">
							<div class="item-name"><strong><a href="">Bacon &amp; Eggs</a></strong></div>
							<div class="item-price"><strong>Php 599</strong></div>
							<div class="item-details">
								<small>By <strong>chaks</strong></small>
								<small>Tags: <strong>round neck</strong>, <strong>silkscreen</strong>, <strong>vector</strong></small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Tables</h1>
			<div class="small-8 small-offset-2">
				<hr>
				<p><strong>This is your standard table.</strong> Use it to present big chunks of information in an organized manner, or show small bits in a more formal manner.</p>
				<hr>
			</div>
			<div class="small-12 medium-8 medium-offset-2">
				<table>
					<thead>
						<tr>
							<th>Description</th>
							<th>SKU</th>
							<th>Inventory</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Round Neck Shirt - Men</td>
							<td>RND-M-S</td>
							<td>355</td>
							<td><a href="" class="button tiny">Edit</a> <a href="" class="button tiny neutral">Delete</a></td>
						</tr>
						<tr>
							<td>Round Neck Shirt - Men <span class="label-pill error">Out of stock</span></td>
							<td>RND-M-M</td>
							<td>0</td>
							<td><a href="" class="button tiny">Edit</a> <a href="" class="button tiny neutral">Delete</a></td>
						</tr>
						<tr>
							<td>Round Neck Shirt - Men</td>
							<td>RND-M-L</td>
							<td>176</td>
							<td><a href="" class="button tiny">Edit</a> <a href="" class="button tiny neutral">Delete</a></td>
						</tr>
						<tr>
							<td>Round Neck Shirt - Men</td>
							<td>RND-M-XL</td>
							<td>865</td>
							<td><a href="" class="button tiny">Edit</a> <a href="" class="button tiny neutral">Delete</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Alerts</h1>
			<div class="small-12 medium-8 medium-offset-2">
				<h3>Octicon Sample</h3>
				<div class="alert">
					<span class="alert-icon icon icon-star"></span>
					</span> <span class="message">Check out our new <a href="">blog post</a>.</span>
					<a href="" class="alert-close"><span class="icon icon-x"></span></a>
				</div>
				<div class="alert success">
					<span class="alert-icon icon icon-check"></span>
					<span class="message">Your design has been approved!</span>
					<a href="" class="alert-close"><span class="icon icon-x"></span></a>
				</div>
				<div class="alert warning">
					<span class="alert-icon icon icon-alert"></span>
					<span class="message">You need to update your security settings.</span>
					<a href="" class="alert-close"><span class="icon icon-x"></span></a>
				</div>
				<div class="alert error">
					<span class="alert-icon icon icon-stop"></span>
					<span class="message">Username/password does not match.</span>
					<a href="" class="alert-close"><span class="icon icon-x"></span></a>
				</div>
			</div>

			<div class="small-12 medium-8 medium-offset-2">
				<h3>Typeicons Sample</h3>
				<div class="alert">
					<span class="alert-icon ticon ticon-star-solid"></span>
					</span> <span class="message">Check out our new <a href="">blog post</a>.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-solid"></span></a>
				</div>
				<div class="alert hollow">
					<span class="alert-icon ticon ticon-star-hollow"></span>
					</span> <span class="message">Check out our new <a href="">blog post</a>.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-hollow"></span></a>
				</div>
				<div class="alert success">
					<span class="alert-icon ticon ticon-check-solid"></span>
					<span class="message">Your design has been approved!</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-solid"></span></a>
				</div>
				<div class="alert success hollow">
					<span class="alert-icon ticon ticon-check-hollow"></span>
					<span class="message">Your design has been approved!</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-hollow"></span></a>
				</div>
				<div class="alert warning">
					<span class="alert-icon ticon ticon-warning-solid"></span>
					<span class="message">You need to update your security settings.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-solid"></span></a>
				</div>
				<div class="alert warning hollow">
					<span class="alert-icon ticon ticon-warning-hollow"></span>
					<span class="message">You need to update your security settings.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-hollow"></span></a>
				</div>
				<div class="alert error">
					<span class="alert-icon ticon ticon-cancel-solid"></span>
					<span class="message">Username/password does not match.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-solid"></span></a>
				</div>
				<div class="alert error hollow">
					<span class="alert-icon ticon ticon-cancel-hollow"></span>
					<span class="message">Username/password does not match.</span>
					<a href="" class="alert-close"><span class="ticon ticon-x-hollow"></span></a>
				</div>
			</div>

			<div class="small-12 medium-8 medium-offset-2">
				<h3>Entypo Sample</h3>
				<div class="alert">
					<span class="alert-icon eticon eticon-star-solid"></span>
					</span> <span class="message">Check out our new <a href="">blog post</a>.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert hollow">
					<span class="alert-icon eticon eticon-star-hollow"></span>
					</span> <span class="message">Check out our new <a href="">blog post</a>.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert success">
					<span class="alert-icon eticon eticon-check"></span>
					<span class="message">Your design has been approved!</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert success hollow">
					<span class="alert-icon eticon eticon-check"></span>
					<span class="message">Your design has been approved!</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert warning">
					<span class="alert-icon eticon eticon-info"></span>
					<span class="message">You need to update your security settings.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert warning hollow">
					<span class="alert-icon eticon eticon-info"></span>
					<span class="message">You need to update your security settings.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert error">
					<span class="alert-icon eticon eticon-warning"></span>
					<span class="message">Username/password does not match.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
				<div class="alert error hollow">
					<span class="alert-icon eticon eticon-warning"></span>
					<span class="message">Username/password does not match.</span>
					<a href="" class="alert-close"><span class="eticon eticon-x"></span></a>
				</div>
			</div>
		</section>
		<section class="row">
			<hr>
			<h1>Icons</h1>
			<div class="small-12 medium-8 medium-offset-2">
				<div class="card small-12">
					<h3>Octicons</h3>
					<hr>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-alert"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-alert</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-alert"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-check"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-check</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-check"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-x"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-x</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-x"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-down"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-down</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-down"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-left"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-left</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-left"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-right"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-right</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-right"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-up"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-up</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-up"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-download"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-download</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-download"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-upload"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-upload</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-upload"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-heart"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-heart</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-heart"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-location"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-location</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-location"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-at"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-at</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-at"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-pencil"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-pencil</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-pencil"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-search"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-search</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-search"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-star"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-star</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-star"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-stop"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-stop</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-stop"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-sync"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-sync</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-sync"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-tag"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-tag</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-tag"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-facebook"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-facebook</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-facebook"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-instagram"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-instagram</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-instagram"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-twitter"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-twitter</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-twitter"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 icon icon-pinterest"></span>
								<code class="display-block padding-top-10 text-yellow">.icon-pinterest</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="icon icon-pinterest"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-12">
					<h3>Typeicons</h3>
					<hr>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-x-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-x-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-x-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-x-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-x-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-x-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-check-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-check-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-check-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-check-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-check-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-check-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-chevron-right-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-chevron-right-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-chevron-right-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-chevron-right-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-chevron-right-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-chevron-right-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-chevron-left-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-chevron-left-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-chevron-left-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-chevron-left-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-chevron-left-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-chevron-left-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-grid-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-grid-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-grid-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-grid-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-grid-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-grid-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-menu-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-menu-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-menu-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-menu-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-menu-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-menu-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-list-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-list-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-list-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-list-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-list-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-list-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-home-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-home-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-home-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-home-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-home-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-home-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-location-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-location-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-location-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-location-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-location-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-location-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-image"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-image</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-image"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-arrow-up-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-arrow-up-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-arrow-up-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-arrow-up-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-arrow-up-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-arrow-up-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-arrow-down-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-arrow-down-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-arrow-down-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-arrow-down-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-arrow-down-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-arrow-down-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-star-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-star-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-star-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-star-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-star-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-star-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-heart-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-heart-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-heart-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-heart-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-heart-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-heart-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-delete-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-delete-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-delete-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-delete-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-delete-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-delete-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-upload-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-upload-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-upload-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-flash-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-flash-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-flash-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-flash-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-flash-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-flash-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-cancel-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-cancel-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-cancel-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-cancel-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-cancel-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-cancel-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-warning-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-warning-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-warning-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-warning-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-warning-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-warning-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-flag-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-flag-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-flag-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-user-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-user-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-user-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-refresh"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-refresh</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-refresh"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-download"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-download</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-download"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-twitter"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-twitter</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-twitter"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-facebook"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-facebook</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-facebook"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-at"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-at</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-at"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-tag"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-tag</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-tag"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 ticon ticon-cart"></span>
								<code class="display-block padding-top-10 text-yellow">.ticon-cart</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="ticon ticon-cart"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-12">
					<h3>Entypo</h3>
					<hr>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-down"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-down</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-down"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-left"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-left</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-left"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-right"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-right</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-right"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-small-down"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-small-down</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-small-down"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-up"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-up</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-up"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-small-left"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-small-left</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-small-left"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-small-right"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-small-right</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-small-right"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-chevron-small-up"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-chevron-small-up</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-chevron-small-up"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-upload"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-upload</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-upload"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-check"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-check</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-check"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-x"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-x</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-x"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-warning"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-warning</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-warning"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-refresh"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-refresh</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-refresh"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-heart-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-heart-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-heart-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-heart"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-heart</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-heart"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-help"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-help</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-help"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-image-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-image-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-image-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-image-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-image-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-image-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-info"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-info</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-info"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-location"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-location</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-location"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-search"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-search</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-search"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-price"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-price</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-price"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-star-hollow"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-star-hollow</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-star-hollow"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-star-solid"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-star-solid</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-star-solid"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-facebook"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-facebook</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-facebook"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-instagram"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-instagram</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-instagram"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-pinterest"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-pinterest</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-pinterest"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
				<div class="card small-8 small-offset-2 medium-6 medium-offset-0">
					<div class="card-container">
						<div class="card-body">
							<div class="text-center padding-10">
								<span class="h1 eticon eticon-twitter"></span>
								<code class="display-block padding-top-10 text-yellow">.eticon-twitter</code>
							</div>
							<p><small>Call this icon with this code:</small></p>
							<pre><code>&lt;span class="eticon eticon-twitter"&gt;&lt;/span&gt;</span></code></pre>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="js/ui.js"></script>

	</body>
</html>