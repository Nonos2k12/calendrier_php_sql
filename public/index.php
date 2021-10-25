<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/calendar.css">

   <title>Mon calendrier</title>
</head>
<body>
   
   <nav class="navbar navbar-dark bg-primary mb-3">
      <a href="/index.php" class="navbar-brand">Mon calendrier</a>
   </nav>

   <?php 
      require '../src/Calendar/Month.php';
      require '../src/Calendar/Events.php';
      $events = new App\Calendar\Events();
      $month = new App\Calendar\Month( $_GET['month'] ?? null, $_GET['year'] ?? null);
      $start = $month->getStartingDay();
      $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
      $weeks = $month->getWeeks();
      $end = (clone $start)->modify('+' . (6 + 7 * ($weeks - 1)) . ' days');
      $events = $events->getEventsBetween($start, $end);
   ?>

   <div class="d-flex flex-row align-items-center justify-content-between">
      <h1><?= $month->toString(); ?></h1>
      <div>
         <a href="/calendrier_php_sql/public/index.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>
         <a href="/calendrier_php_sql/public/index.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>
      </div>
   </div>

   <?php $month->getWeeks(); ?>

   <table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
      <?php for ($i = 0; $i < $weeks; $i++): ?>
         <tr>
            <?php foreach($month->days as $k => $day):
               $date = (clone $start)->modify("+" . ($k + $i * 7) . " days")
            ?>
            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
               <?php if ($i === 0): ?>
                  <div class="calendar__weekday"><?= $day; ?></div>
                  <?php endif; ?>
               <div class="calendar__day"><?= $date->format('d'); ?></div>
            </td>
            <?php endforeach; ?>
         </tr>
         <?php endfor; ?>
   </table>

</body>
</html>