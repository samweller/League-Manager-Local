<?php
/*
  Add / Edit Locations Page Template
*/
?>

<script type="javascript">
Leaguemanager.reInit();
</script>

<?php
if ( !current_user_can( 'manage_leagues' ) ) : 
  echo '<p style="text-align: center;">'.__("You do not have sufficient permissions to access this page.").'</p>';
else :
  $edit = false;
  if ( isset( $_GET['edit'] ) ) {
    $edit = true;
    $location = $leaguemanager->getLocation($_GET['edit']);
    $form_title = __( 'Edit Location', 'leaguemanager' );
  } else {
    $form_title = __( 'Add Location', 'leaguemanager' );
    $location = (object)array( 'name' => '', 'address' => '', 'state' => '', 'team_id' => '' );
  }

  $league_id = isset($_GET['league_id']) ? $_GET['league_id'] : '';
  $season = isset($_GET['season']) ? $_GET['season'] : '';
  $teams = $leaguemanager->getTeams($search=false);

?>

  <div class="wrap">
    <h2><?php echo $form_title ?></h2>
    
    <form action="admin.php?page=leaguemanager&amp;subpage=show-league&amp;league_id=<?php echo $league_id ?>&amp;season=<?php echo $season ?>"
      method="post"
    name="location_edit">
      <ol>
        <li>
          <label for="Name">Ground Name</label>
          <input type="text" name="name" id="name" value="<?php echo $location->name; ?>" />
        </li>
        <li>
          <label for="Address">Address</label>
          <input type="text" name="address" id="address" value="<?php echo $location->address; ?>" />
        </li>
        <li>
          <label for="Lat-Long">State, Country</label>
          <input type="text" name="state" id="state" value="<?php echo $location->state; ?>" />
        </li>
        <li>
          <label for="Team">Choose Team</label>
          <select size="1" name="team_id" id="team_id">
          <?php foreach ( $teams AS $team ) : ?>
            <option value="<?php echo $team->id ?>"<?php echo ($team->id == $location->team_id) ? '"selected"' : ''; ?>><?php echo $team->title ?></option>
          <?php endforeach; ?>
          </select>
        </li>
      </ol> 

      <input type="hidden" name="league_id" value="<?php echo $league_id ?>" />
      <input type="hidden" name="updateLeague" value="location" />
      <input type="hidden" name="season" value="<?php echo $season ?>" />

      <p class="submit"><input type="submit" value="<?php echo $form_title ?> &raquo;" class="button" /></p>

    </form>
  </div>
  
<?php endif; ?>
