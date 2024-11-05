<?php

function displayFlashMessage($messageType)
{
    $session = session();

    if ($session->has($messageType)) {
        echo '<div class="alert alert-' . ($messageType === 'success_message' ? 'success' : 'danger') . '">';
        echo $session->get($messageType);
        echo '</div>';

        // Remove the message after displaying it
        $session->remove($messageType);
    }
}
