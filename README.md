
##  Установка

1. git clone https://github.com/natashand/moodle-local-plugin.git

2. cd moodle-local-plugin

3. docker-compose up -d

4.  ./install_plugin.sh - установка плагина

5. Зайдите в Moodle под администратором → "Администрирование сайта" → "Уведомления"  
   Moodle обнаружит и установит плагин

## Настройка HubSpot

1. Зайдите в [https://app.hubspot.com](https://app.hubspot.com)
2. Перейдите в `Settings → Integrations → Private Apps`
3. Создайте Private App и получите Token (начинается с `pat-`)
4. Вставьте токен в `index.php`:

5. При необходимости создайте кастомное поле `username` в HubSpot:

   - Settings → Properties → Create Property (Object: Contact)
   - Internal name: `username`
   - Field type: Single-line text

##  Тестирование

После установки, форма будет доступна по пути:

http://ВАШ_СЕРВЕР/local/hubspotform/
