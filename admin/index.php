<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Morris.js Charts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="render_me">

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
    </div>

	<a href="#" class="go-top">Go Top</a>





<?php require_once 'header-footer/footer.php';?>


<script type="text/javascript">
	Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

</script>
<script type="text/javascript" src="../lib/js/jspdf/dist/jspdf.min.js"></script>
<script type="text/javascript" src="../lib/js/html2canvas/dist/html2canvas.js"></script>
	<script autoload="true">
	$(document).ready(function(){
		// debugger;
// 		var pdf = new jsPDF('p', 'pt', 'letter')

// // source can be HTML-formatted string, or a reference
// // to an actual DOM element from which the text will be scraped.
// , source = $('#render_me')[0]

// // we support special element handlers. Register them with jQuery-style
// // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
// // There is no support for any other type of selectors
// // (class, of compound) at this time.
// , specialElementHandlers = {
// 	// element with id of "bypass" - jQuery style selector
// 	'#render_me': function(element, renderer){
// 		// true = "handled elsewhere, bypass text extraction"
// 		return true
// 	}
// }

// margins = {
//     top: 80,
//     bottom: 60,
//     left: 40,
//     width: 522
//   };
//   // all coords and widths are in jsPDF instance's declared units
//   // 'inches' in this case
// pdf.fromHTML(
//   	source // HTML string or DOM elem ref.
//   	, margins.left // x coord
//   	, margins.top // y coord
//   	, {
//   		'width': margins.width // max width of content on PDF
//   		, 'elementHandlers': specialElementHandlers
//   	},
//   	function (dispose) {
//   	  // dispose: object with X, Y of the last line add to the PDF
//   	  //          this allow the insertion of new lines after html
//         pdf.output('datauri');
//       },
//   	margins
//   )


     html2canvas($("#page-wrapper"), {
            onrendered: function(canvas) {
                console.log('aa');
                theCanvas = canvas;
                document.body.appendChild(canvas); 
            }
        });
    // var canvas = $('canvas').html();
        
    // debugger;
    // var imgData = canvas.toDataURL("image/jpeg", 1.0);
    // var pdf = new jsPDF();

    // pdf.addImage(imgData, 'JPEG', 0, 0);

    // pdf.output('datarui');



	});


	</script>