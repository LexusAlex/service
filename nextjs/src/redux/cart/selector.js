const selectorCartModule = (state) => state.cart;

export const selectorProductAmount = (state, id) => selectorCartModule(state)[id] || 0;
