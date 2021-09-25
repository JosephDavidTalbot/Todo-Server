<article>
    <div class="row">
        <div class="col-lg-6">
            <p>Welcome back, <?= $user_name; ?>. You are user #<?= $user_id; ?></p>

            <?= \Config\Services::validation()->listErrors() ?>

            <form action="/dashboard/create" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="user_id" value=<?= $user_id; ?> />

                <label style="display: inline-block; width: 100px;" for="title">Event Title:</label>
                <input type="input" name="title" /><br />

                <label style="display: inline-block; width: 100px;" for="body">Text:</label>
                <textarea name="body"></textarea><br />

                <label style="display: inline-block; width: 100px;" for="start">Event Date:</label>
                <input type="date" name="event_date"></br>

                <input type="submit" name="submit" value="Create new event" />
            </form>
        </div>
        <div class="col-lg-6">

            <?php if (! empty($events) && is_array($events)) : ?>

                <?php foreach ($events as $events_item): ?>
                    <div class="col-xs-12 centered">
                        <div class="card">
                            <div class="card-header">
                                <?= esc($events_item['event_title']) ?><br/>
                                <?= esc($events_item['event_date']) ?>
                            </div>
                            <div class="card-body">
                                <?= esc($events_item['event_body']) ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <h3>No events</h3>

                <p>Unable to find any events for you.</p>

            <?php endif ?>
        </div>
    </div>
</article>
