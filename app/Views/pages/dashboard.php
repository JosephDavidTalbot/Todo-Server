<article>
    <div class="row">
        <div class="col-lg-6">
            <p>Welcome back, <?= $user_name; ?></p>
        </div>
        <div class="col-lg-6">
            <?php if (! empty($events) && is_array($events)) : ?>

                <?php foreach ($events as $events_item): ?>

                    <h3><?= esc($events_item['title']) ?></h3>

                    <div class="main">
                        <?= esc($events_item['body']) ?>
                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <h3>No events</h3>

                <p>Unable to find any events for you.</p>

            <?php endif ?>
        </div>
    </div>
</article>
