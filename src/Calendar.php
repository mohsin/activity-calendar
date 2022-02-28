<?php

namespace Mohsin\ActivityCalendar;

use Carbon\Carbon;

class Calendar
{
    /**
     * @var int The columns per row.
     */
    protected $columns = 3;

    /**
     * @var string List of activities.
     */
    protected $activities = [];

    /**
     * Sets the columns per row.
     * @var int The desired column per row.
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Adds an activity to the list of activities.
     * @var string The activity name.
     * @var string An icon for the activity.
     */
    public function addActivity($name, $icon = 'hiking')
    {
        array_push($this->activities, [
            'name' => $name,
            'icon' => $icon
        ]);
    }
 
    /**
     * Returns the activity calendar HTML.
     * @return string The printable output.
     */
    public function outputHtml()
    {
        $tempDate = Carbon::now();
        $activitiesHtml = '';
        $rowChunks = array_chunk(range(1, 12), $this->columns);
        foreach ($rowChunks as $rowChunk) {
            $activitiesHtml .= '<div class="row text-center my-3">';
            foreach ($rowChunk as $month) {
                $tempDate->month = $month;
                $activitiesHtml .= sprintf('<div class="col col-%s">', 12 / $this->columns);
                $activitiesHtml .= sprintf('<h5 class="heading">%s</h5>', $tempDate->monthName);
                foreach (range(1, $tempDate->daysInMonth) as $day) {
                    $activitiesHtml .= sprintf('%d: ', $day);
                    foreach ($this->activities as $value) {
                        $activitiesHtml .= sprintf('<span class="activity-icon fas fa-%s" role="img"></span>', $value['icon']);
                    }
                    $activitiesHtml .= '<br/>';
                }
                $activitiesHtml .= sprintf('</div>');
            }
            $activitiesHtml .= '</div>';
        }
        return <<< THEHTML
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body class="container">
$activitiesHtml
</body>
</html>
THEHTML;
    }
}
