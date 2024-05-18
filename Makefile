.PHONY: docker
docker:
	@docker-compose up -d

.PHONY: relase
release:
	@$(eval VERSION=$(filter-out $@,$(MAKECMDGOALS)))
	./scripts/release.sh $(VERSION)

%:
	@: