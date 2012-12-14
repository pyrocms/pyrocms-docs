# Debug Helper

A simple debugging helper for use while developing.

## Functions


### dump(args)

Do a `var_dump()` along with a bounding box and file info.

#### Example Output

<fieldset style="background: #fefefe !important; border:2px red solid; padding:5px"><legend style="background:lightgrey; padding:5px;">/path/to/file.php @ line: 42</legend><pre><br/><strong>Debug #1 of 1</strong>: array(4) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  bool(true)
  [3]=>
  string(6) "Orange"
}
</pre></fieldset>