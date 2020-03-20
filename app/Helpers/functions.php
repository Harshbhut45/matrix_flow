<?php
    function getStatusBadgeClass($status) {
        switch ($status) {
            case 'Pending':
                return 'badge badge-warning';
            case 'Active':
                return 'badge badge-success';
            case 'Inactive':
                return 'badge badge-primary';
            case 'Rejected':
                return 'badge badge-secondary';
            case 'Blocked':
                return 'badge badge-danger';
            default:
                //
        }
    }

    function getNewsStatusBadge($status) {
        switch ($status) {
            case 'Unpublished':
                return 'badge badge-warning';
            case 'Published':
                return 'badge badge-success';
            case 'Pending':
                return 'badge badge-primary';
            case 'Draft':
                return 'badge badge-secondary';
            default:
                //
        }
    }

    function getDateFormat($date) {
        return \Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('h:i A d/m/Y');
    }

    function yieldTitle($title = null) {
        return $title ? $title . ' - ' . \Config::get('constants.project.title'): \Config::get('constants.project.title');
    }

    function getMediaType($extension) {
        if($extension == 'mp4') {
            return 'video';
        }
        return 'image';
    }

