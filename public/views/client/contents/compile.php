	<form method="post" id="form-compile"> <!-- form-start -->
	<div class="row">
		<div class="col-xs-12 col-md-7">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					<span>CODE</span>

				</div>
				<div class="panel-body">
					<textarea class="my-code-area" name="code">
#include<iostream>
#include<stdio.h>

using namespace std;

int main ()
{
cout<<"hello world";

getchar(); //freezes the screen
}
				</textarea>
				<input type="hidden" name="form" value="form-compile">
				<span class="pull-right">
					<button type="submit" name="submit" class="mLn200 button-compile btn btn-info btn-sm">COMPILE</button>
					<button class="mLn116 button-compile btn btn-danger btn-sm">DOWNLOAD EXE</button>
				</span>
				</div>
	</form> 								<!-- form-end -->
			</div>
		</div>
		<div class="col-xs-12 col-md-5">
			<div class="panel panel-default">
				
				<div class="panel-heading">OUTPUT</div>
				<div class="panel-body">
					<div class="highlight">
					
						<pre class="output">
hello world
						</pre>

					</div>
				</div>
			</div>
						<div class="panel panel-default">
				
				<div class="panel-heading">Compilation</div>
				<div class="panel-body">
					<div class="highlight">
					
						<pre class="error-log">
Compilation complete
						</pre>

					</div>
				</div>
			</div>


		</div>
	</div>