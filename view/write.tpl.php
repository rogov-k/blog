<form class="form-input-post">
    <h2 class="form-h2">Write the story</h2>
    <div class="form-text">
        <textarea name="input-text" class="font" placeholder="Что расскажешь нового, <?php echo $_SESSION['user']['name']; ?>?"></textarea>
        <input type="hidden" name="_csrf" value="<?php echo $_SESSION['token']['value']; ?>">
    </div>
    <h2 class="form-h2">Pick the message subject</h2>
    <div class="form-subject">
        <div class="subject-item">
            <input type="radio" name="subject" value="0" id="subject-0" checked>
            <label for="subject-0"></label>
        </div>
        <div class="subject-item">
            <input type="radio" name="subject" value="1" id="subject-1">
            <label for="subject-1"></label>
        </div>
        <div class="subject-item">
            <input type="radio" name="subject" value="2" id="subject-2">
            <label for="subject-2"></label>
        </div>
        <div class="subject-item">
            <input type="radio" name="subject" value="3" id="subject-3">
            <label for="subject-3"></label>
        </div>
        <div class="subject-item">
            <input type="radio" name="subject" value="4" id="subject-4">
            <label for="subject-4"></label>
        </div>
    </div>
    <div class="form-submit">
        <input type="submit" value="Publish" class="font">
    </div>
</form>