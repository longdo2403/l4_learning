@extends('frontend.layouts.master')
@section('content')
<h1>Welcome: {{Auth::user()->username}}</h1>
<?php if (!$listUser->isEmpty()): ?>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Username</td>
        </tr>
        <?php foreach ($listUser as $user): ?>
        <tr>
            <td><?= SecurityHelper::xss_clean($user->id); ?></td>
            <td><?= SecurityHelper::xss_clean($user->username); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

@stop