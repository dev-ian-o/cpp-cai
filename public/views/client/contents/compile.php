<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php session_start(); 
	if(isset($_SESSION['file_name']))
	{
		$filename = $_SESSION['file_name'];
		$filename = pathinfo($dir."/compiled-cpp/".$_SESSION['file_name'],PATHINFO_FILENAME) . ".exe";
		$filename = "http://".$_SERVER['SERVER_NAME']."/cai_project/compiled-cpp/".$filename;
	}
	else{
		$filename = "http://".$_SERVER['SERVER_NAME']."/cai_project/compiled-cpp/default.exe";
	}
?>


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
					<a href="<?= $filename; ?>"class="mLn116 button-compile btn btn-danger btn-sm" download>DOWNLOAD EXE</a>
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