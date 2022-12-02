  <nav class="nav">
    <ul class="nav__list container">
    <?php foreach ($categories as $category) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?= $category["name_category"] ?></a>
      </li>
      <?php endforeach ?>
    </ul>
  </nav>

<main class="container">
  <?php $classname = isset($errors) ? "form--invalid" : ""; ?>
  <form class="form form--add-lot container <?= $classname; ?>" action="add_lot.php" method="post">
    <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
    <?php $classname = isset($errors["lot-name"]) ? "form__item--invalid" : ""; ?>
      <div class="form__item <?= $classname; ?>">
        <!-- form__item--invalid -->
        <label for="lot-name">Наименование <sup>*</sup></label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $lot['lot-name']; ?>">
        <span class="form__error">Введите наименование лота</span>
      </div>
      <?php $classname = isset($errors["category"]) ? "form__item--invalid" : ""; ?>
      <div class="form__item <?= $classname; ?>">
        <label for="category">Категория <sup>*</sup></label>
        <select id="category" name="category">
          <option>Выберите категорию</option>
          <?php foreach ($categories as $category) : ?>
          <option value="<?= $category['id']; ?>"><?= $category["name_category"] ?></option>
          <?php endforeach ?>
        </select>
        <span class="form__error"><?= $errors['category']; ?> </span>
      </div>
    </div>
    <?php $classname = isset($errors["message"]) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--wide <?= $classname; ?>">
      <label for="message">Описание <sup>*</sup></label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $lot['message']; ?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <?php $classname = isset($errors["lot-img"]) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--file <?= $classname; ?>">
      <label>Изображение <sup>*</sup></label>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="lot-img" value="" name = "lot-img">
        <label for="lot-img">
          Добавить
        </label>
      </div>
      <span class="form__error"><?= $errors['lot-img']; ?></span>
    </div>
    <div class="form__container-three">
    <?php $classname = isset($errors["lot-rate"]) ? "form__item--invalid" : ""; ?>
      <div class="form__item form__item--small <?= $classname; ?>">
        <label for="lot-rate">Начальная цена <sup>*</sup></label>
        <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?= $lot['lot-rate']; ?>">
        <span class="form__error"><?= $errors["lot-rate"]; ?></span>
      </div>
      <?php $classname = isset($errors["lot-step"]) ? "form__item--invalid" : ""; ?>
      <div class="form__item form__item--small <?= $classname; ?>">
        <label for="lot-step">Шаг ставки <sup>*</sup></label>
        <input id="lot-step" type="text" name="lot-step" placeholder="0" value="<?= $lot['lot-step']; ?>">
        <span class="form__error"><?= $errors["lot-step"]; ?></span>
      </div>
      <?php $classname = isset($errors["lot-date"]) ? "form__item--invalid" : ""; ?>
      <div class="form__item <?= $classname; ?>">
        <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
        <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
        <span class="form__error"><?= $errors["lot-date"]; ?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>

<script src="../flatpickr.js"></script>
<script src="../script.js"></script>