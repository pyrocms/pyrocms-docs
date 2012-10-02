# Image Field Type 
 
The image field type allows you to upload and resize an image.
 
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
   <td>Resize Width</td> 
   <td>Number of pixels to resize the image to width-wise. Can be left blank.</td> 
  </tr> 
  <tr> 
   <td>Resize Height</td> 
   <td>Number of pixels to resize the image to height-wise. If left blank while the Resize Height field is filled, this will be calculated based on the dimensions of the image.</td> 
  </tr> 
  <tr> 
   <td>Allowed Types</td> 
   <td>Allowed types separated by pipe characters. Ex: jpg|gif|png.</td> 
  </tr> 
</tbody> 
</table> 
 
## Output

The image field type outputs the following nested variables.
 
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
   <td>File name of the image.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:image&nbsp;}}</td> 
   <td>Full path to the image.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:img&nbsp;}}</td> 
   <td>A full img tag with the image. Adds the image file name as the "alt" attribute.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:ext&nbsp;}}</td> 
   <td>The image extension.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:mimetype&nbsp;}}</td> 
   <td>The image mimetype.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:width&nbsp;}}</td> 
   <td>Width of the full image.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:height&nbsp;}}</td> 
   <td>Height of the full image.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:thumb&nbsp;}}</td> 
   <td>Full URL to a 200px width thumb of the image. Returns the actual image if it is under 200px wide.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:thumb_img&nbsp;}}</td> 
   <td>Img tag for a 200px width thumb of the image. Returns the actual image if it is under 200px wide. File name is set as the "alt" attribute.</td>  </tr> 
</tbody> 
</table>