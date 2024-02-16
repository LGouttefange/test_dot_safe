interface HydraMember {
	"@context": string;
	"@id": string;
	"@type": string;
}

export interface HydraView {
	"@id": string;
	type: string;
	"hydra:first": string;
	"hydra:last": string;
	"hydra:previous": string;
	"hydra:next": string;
}

export interface HydraMapping {
	"@type": string;
	variable: string;
	property: string;
	required: boolean;
}

export interface HydraSearch {
	"@type": string;
	"hydra:template": string;
	"hydra:variableRepresentation": string;
	"hydra:mapping": HydraMapping[];
}

export interface HydraCollection<T extends HydraMember> {
	"hydra:member": Array<T>;
	"hydra:totalItems": number;
	"hydra:view": HydraView;
	"hydra:search": HydraSearch;
}

export type Todo = HydraMember & {
	id: string;
	title: string;
	completed: boolean;
	dueDate: string;
	completionProgress: number;
};
