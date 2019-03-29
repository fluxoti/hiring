FROM php:alpine

LABEL maintainer="Lucas Cândido de Souza Silva <lcssbr@gmail.com>"

RUN apk add --no-cache wget ca-certificates && \
    wget -O /etc/apk/keys/phpearth.rsa.pub https://repos.php.earth/alpine/phpearth.rsa.pub && \
    echo "https://repos.php.earth/alpine/v3.9" >> /etc/apk/repositories && \
    apk update && apk upgrade && \
    apk add --no-cache php7.3-dev php7.3-composer yarn

RUN adduser -D hn hn

USER hn

ENV PATH /home/hn/.yarn/bin:$PATH

RUN composer g require psy/psysh:@stable hirak/prestissimo && \
    yarn global add @vue/cli
