# File Field Type 
 
The file field type allows you to upload and link to a file.
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100"> 
    Parameter</th> 
   <th width="100"> 
    Example</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>Upload Folder</td> 
   <td>Interfaces with the PyroCMS files module. Create an upload folder in the files module and select it here.</td> 
  </tr> 
  <tr> 
   <td>Allowed Types</td> 
   <td>Allowed types separated by pipe characters. Ex: doc|pdf.</td> 
  </tr> 
</tbody> 
</table> 
 
<h3> 
 Output</h3> 
<p> 
 The image field type outputs the following nested variables.</p> 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100"> 
    Variable</th> 
   <th width="100"> 
    Example</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>{{&nbsp;field\_slug:filename&nbsp;}}</td> 
   <td>Name of the file.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:file&nbsp;}}</td> 
   <td>Full path to the file.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:ext&nbsp;}}</td> 
   <td>The file extension.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:mimetype&nbsp;}}</td> 
   <td>The file mimetype.</td> 
  </tr> 
</tbody> 
</table>