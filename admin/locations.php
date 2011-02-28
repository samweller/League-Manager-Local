/*
  Display locations table on LM home page
*/
<form id="teams-filter" action="" method="post" name="standings">
<?php wp_nonce_field( 'teams-bulk' ) ?>


<table width="100%" class="widefat" title="Match Locations Grounds Arenas">
  <thead>
    <tr>
      <th>X</th>
      <th>ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Club</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    //print_r($locations);
    foreach( $locations AS $location ) : $class = ( 'alternate' == $class ) ? '' : 'alternate'; ?>
      <tr>
        <td></td>
        <td><?php echo $location->id; ?></td>
        <td><?php echo $location->name; ?></td>
        <td><?php echo $location->address; ?></td>
        <td></td>
      </tr>
    <?php endforeach; ?>
  </tobdy>
</table>

</form>