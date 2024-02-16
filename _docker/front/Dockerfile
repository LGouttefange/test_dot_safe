FROM node:20.9.0-alpine AS base
RUN apk add --update shadow

WORKDIR /var/www

COPY ./_docker/front/docker-entrypoint.sh /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["npm run dev --host"]
