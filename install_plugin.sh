#!/bin/bash

PLUGIN_NAME="hubspotform"
CONTAINER_NAME="moodle_app"
LOCAL_PLUGIN_PATH="./local_hubspotform"
CONTAINER_PLUGIN_PATH="/bitnami/moodle/local/$PLUGIN_NAME"

echo "👉 Проверка, существует ли папка с плагином: $LOCAL_PLUGIN_PATH"
if [ ! -d "$LOCAL_PLUGIN_PATH" ]; then
    echo "❌ Папка '$LOCAL_PLUGIN_PATH' не найдена! Убедись, что она находится рядом со скриптом."
    exit 1
fi

echo "📦 Копируем плагин '$PLUGIN_NAME' в контейнер '$CONTAINER_NAME'..."
docker cp "$LOCAL_PLUGIN_PATH" "$CONTAINER_NAME:$CONTAINER_PLUGIN_PATH"

echo "✅ Плагин скопирован в контейнер."

echo "🔄 Перезапускаем контейнер '$CONTAINER_NAME'..."
docker restart "$CONTAINER_NAME"

echo ""
echo "🎉 Готово! Теперь зайди в Moodle:"
echo "👉 http://localhost:8082/local/$PLUGIN_NAME/"
echo ""
echo "Если появится предложение обновить базу данных — нажми 'Продолжить'."
