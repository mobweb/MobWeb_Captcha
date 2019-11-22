# MobWeb_Captcha extension for Magento

A captcha for the customer account registration form that is a bit more user friendly and configurable.

## Installation

- Download [Securimage](https://www.phpcaptcha.org/) from [here](https://www.phpcaptcha.org/download/) and place it into the `lib` folder in Magento's root directory.

- Add the following to your `persistent/customer/form/register.phtml` template, most likely starting at line 77, below the gender widget:

```
<?php $_captcha = $this->getLayout()->createBlock('mobweb_captcha/widget_captcha') ?>
<?php if ($_captcha->isEnabled()): ?>
    <li><?php echo $_captcha->toHtml() ?></li>
<?php endif ?>
```

- Enable the extension in its config

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).