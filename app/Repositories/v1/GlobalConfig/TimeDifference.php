<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

use Illuminate\Support\Carbon;

trait TimeDifference
{
    public function difference($date, $time)
    {
        $dateTimeFormat = Carbon::createFromFormat('d/m/Y H:i', Carbon::now()->format($date . ' ' . $time));

        $startDateFormat = $dateTimeFormat->format('Y-m-d H:i');

        $startDate = new \DateTime($startDateFormat);
        $endDate = new \DateTime('Asia/Kuala_Lumpur');

        $diff = $startDate->diff($endDate);

        if ($diff->y != 0) {
            if ($diff->y == 1) {
                $timeDiff = 'Last year';
            } else {
                $timeDiff = $diff->y . ' years ago';
            }
        } elseif ($diff->m != 0) {
            if ($diff->m == 1) {
                $timeDiff = 'Last month';
            } else {
                $timeDiff = $diff->m . ' months ago';
            }
        } elseif ($diff->d != 0) {
            if ($diff->d == 1) {
                $timeDiff = 'Yesterday';
            } else {
                $timeDiff = $diff->d . ' days ago';
            }
        } elseif ($diff->h != 0) {
            if ($diff->h == 1) {
                $timeDiff = 'An hour ago';
            } else {
                $timeDiff = $diff->h . ' hours ago';
            }
        } elseif ($diff->i != 0) {
            if ($diff->i == 1) {
                $timeDiff = 'A minute ago';
            } else {
                $timeDiff = $diff->i . ' minutes ago';
            }
        } else {
            $timeDiff = 'Just now';
        }

        return $timeDiff;
    }
}