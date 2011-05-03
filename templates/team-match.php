<?php
/**
Template to display next single match for a specific team

The following variables are usable:
  
  $league: league object
  $team: team object
  $next_match: next match object
  $prev_match: previous match object

  You can check the content of a variable when you insert the tag <?php var_dump($variable) ?>
*/
?>

<div class="teampage">

  <?php if ( isset($_GET['show']) ) : ?>
    <!-- Single Team Member -->
    <?php dataset($_GET['show']); ?>
  <?php else : ?>
  
  <div class="matches">
  <?php if ( $next_match ) : ?>
  <div class="next_match">
    <h4><?php _e( 'Next Match','leaguemanager' ) ?></h4>
    <p class="match"><?php echo $next_match->match ?></p>
    <p class='match_day'><?php printf(__("<strong>%d.</strong> Match Day", 'leaguemanager'), $next_match->match_day); ?></p>

    <?php $time = ( '00:00' == $next_match->hour.":".$next_match->minutes ) ? '' : mysql2date(get_option('time_format'), $next_match->date); ?>
    <p class='match_date'><?php echo mysql2date("j. F Y", $next_match->date) ?>&#160;<span class='time'><?php echo $time ?></span> <span class='location'><?php echo $next_match->location ?></span></p>
  </div>
  <?php endif; ?>

  <?php if ( $prev_match ) : ?>
  <div class="prev_match">
    <h4><?php _e( 'Last Match','leaguemanager' ) ?></h4>
    <p class="match"><?php echo $prev_match->match ?></p>
    <p class='match_day'><?php printf(__("<strong>%d.</strong> Match Day", 'leaguemanager'), $prev_match->match_day); ?></p>
    <p class="score"><?php echo $prev_match->score ?></p>
  </div>
  <?php endif; ?>
  </div>

  <?php if ( !empty($team->roster['id']) && function_exists('project') ) : ?>
<!--    <h4 style="clear: both;"><?php _e( 'Team Roster', 'leaguemanager' ) ?></h4>-->
    <?php project($team->roster['id'], array('selections' => false) ); ?>
  <?php endif; ?>
  
  <?php endif; ?>
</div>
