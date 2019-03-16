  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.5/css/tableexport.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.5/js/tableexport.min.js"></script>

      <style media="screen">
      table ,tr td{
        border:1px solid red
        }
        tbody {
          display:block;
          height:450px;
          overflow:auto;
        }
        thead, tbody tr {
          display:table;
          width:100%;
          table-layout:fixed;/* even columns width , fix width of table too*/
        }
        thead {
          width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
        }
        .btn-toolbar {
           margin-left: 0px;
        }
      </style>
    </head>
    <body>
      <div class="tbl_container1">
    		<table id="listing" class="table table-bordered table table-hover" cellspacing="0" width="100%">
    			<colgroup><col><col><col></colgroup>
    			<thead>
    				<tr>
    					<tr>
    						<th>Name</th>
    						<th >Salary</th>
    						<th>Age</th>
    					</tr>
    				</tr>
    			</thead>
    			<tbody id="emp_body">
    			</tbody>
    		</table>
    	</div>


      <script type="text/javascript">
        

        $(document).ready(function(){
        	function ExportTable(){
        				$("table").tableExport({
        				headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
        				footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
        				formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
        				fileName: "id",                    // (id, String), filename for the downloaded file
        				bootstrap: true,                   // (Boolean), style buttons using bootstrap
        				position: "well" ,                // (top, bottom), position of the caption element relative to table
        				ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file
        				ignoreCols: null,                 // (Number, Number[]), column indices to exclude from the exported file
        				ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
        			});
        			}
        });
      </script>
    </body>
  </html>
